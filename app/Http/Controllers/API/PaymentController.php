<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

class PaymentController extends Controller
{
    protected $serviceUrl = 'https://e-commerce.kapitalbank.az:5443/Exec';
    protected $cert = "testmerchant.crt";
    protected $key = "merchant_name.key";
    protected $merchant_id = 'E1000010';
    protected $language = 'AZ';
    const PORT = 5443;

    public function __construct()
    {
        if (file_exists(base_path($this->cert)) ) {
            $this->cert = base_path($this->cert) ;

        } else {
            throw new \Exception("Certificate does not exists: $this->cert");
        }
        if ( file_exists( base_path($this->key)) ) {
            $this->key =   base_path($this->key) ;
        } else {
            throw new \Exception("Key does not exists:  " . base_path($this->key));
        }
    }

    public function curl($xml){
        $url = $this->serviceUrl;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_PORT, self::PORT);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($ch, CURLOPT_SSLCERT,  $this->cert );
        curl_setopt($ch, CURLOPT_SSLKEY,  $this->key );

        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        //Error handling and return result
        $data = curl_exec($ch);

        if ($data ==  false)
        {$result = curl_error($ch);   }
        else{$result = $data;}
        // Close handle
        curl_close($ch);

        return $result;
    }


    public function index(){
        return 'index';
    }


    public function createOrder(Request $request){
        $amount = Session::get('total_Price');

        $order_data = array(
            'merchant' => $this->merchant_id,
            'amount' => $amount*100,
            'currency' => 944,
            'description' => "Ad: ".Auth::guard('customer')->user()->name.", Soyad: ".Auth::guard('customer')->user()->surname
                .", Adres: ".$request->adress.", Telefon: ".$request->phone.", Mesaj: ".$request->message,
            'lang' => 'AZ'
        );

        $approve = route('approve',Auth::guard('customer')->user()->id) ;
        $decline = route('decline',Auth::guard('customer')->user()->id) ;
        $cancel = route('cancel',Auth::guard('customer')->user()->id) ;

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                      <Request>
                               <Operation>CreateOrder</Operation>
                                <Language>'.$order_data['lang'].'</Language>
                                <Order>
                                    <OrderType>Purchase</OrderType>
                                    <Merchant>'.$this->merchant_id.'</Merchant>
                                    <Amount>'.$order_data['amount'].'</Amount>
                                    <Currency>'.$order_data['currency'].'</Currency>
                                    <Description>'.$order_data['description'].'</Description>
                                    <ApproveURL>'.$approve.'</ApproveURL>
                                    <CancelURL>'.$decline.'</CancelURL>
                                    <DeclineURL>'.$cancel.'</DeclineURL>
                              </Order>
                      </Request>
                </TKKPG> ';
        //return $xml;

        $result = $this->curl($xml);
       return $this->handleCurlResponse($order_data,$result);

    }

    public function handleCurlResponse($inital_data, $data){

        $oXML = new SimpleXMLElement($data);

        $OrderID = $oXML->Response->Order->OrderID;
        $SessionID = $oXML->Response->Order->SessionID;
        $paymentBaseUrl = $oXML->Response->Order->URL;

        Payment::create([
            'user_id' => Auth::guard('customer')->user()->id,
            'amount' =>  number_format($inital_data['amount']/100, 2,',', '.'),
            'order_id' => $OrderID,
            'session_id' => $SessionID,
            'payment_url' => $paymentBaseUrl,
            'status_code' => $oXML->Response->Status,
            'order_description' => $inital_data['description'],
            'currency' => $inital_data['currency'],
            'language_code' => $inital_data['currency'],
        ]);

        $redirectUrl = $paymentBaseUrl."?ORDERID=".$OrderID."&SESSIONID=".$SessionID."&";

        return redirect()->to($redirectUrl);
    }




    public function approveUrl(Request $request){

        $xmlmsg = new SimpleXMLElement($request->xmlmsg);

        $getPaymentRow = Payment::where('order_id', '=', $xmlmsg->OrderID)->first();

        $user = Customer::find($getPaymentRow->user_id);

        Auth::guard('customer')->login($user);

        $basket_products = Cart::where('customer_id',$getPaymentRow->user_id)->get();

        if($getPaymentRow){
            $getPaymentRow->update([
                'order_status' => $xmlmsg->OrderStatus,
            ]);
        }

        $order_information = [];

        foreach($basket_products as $item){

            $data = [
                'quantity' =>$item->quantity,
                'lang' =>$item->product->lang,
                'name' => $item->product->name,
                'product_id' => $item->product->product_id,
                'price' => $item->product->sale_price,
            ];
            array_push($order_information,$data);

        }

        $order_data = [
            'user_id'=>$getPaymentRow->user_id ,
            'payment_order_id'=>$getPaymentRow->order_id ,
            'user_information' => $xmlmsg->OrderDescription,
            'order_information' => json_encode($order_information),
            'status' => 0
        ];

       $saveOrder = Order::create($order_data);

       $delete = Cart::where('customer_id',$getPaymentRow->user_id)->delete();

        $feedbackdata = ['title' => 'Ödənişiniz uğurla başa çatmışdır!',
            'text' => 'Sifarişiniz uğurla başa çatmışdır.Tərəfimizdən sizinlə əlaqə saxlanılacaqdır' ,
            'icon' => 'success',
            'button' => 'Bağla',];

        return  redirect()->route('customer.invoice',$getPaymentRow->order_id )->with('feedback', $feedbackdata);
     redirect()->route('site.index')->with('feedback', $feedbackdata);

    }



    public function cancelUrl(Request $request){

        $xmlmsg = new SimpleXMLElement($request->xmlmsg);

        $getPaymentRow = Payment::where('order_id', '=', $xmlmsg->OrderID)->first();

        if($getPaymentRow){
            $getPaymentRow->update([
                'order_status' => $xmlmsg->OrderStatus,
            ]);
        }

        return redirect()->route('site.index')->with('flash_message_error','Ödəniş ləğv edildi');
    }

    public function declineUrl(Request $request){

        if ($request->filled('xmlmsg')){
            $xmlmsg = new SimpleXMLElement($request->xmlmsg);
            //dd($xmlmsg->OrderStatus);
            $getPaymentRow = Payment::where('order_id', '=', $xmlmsg->OrderID)->first();
            if($getPaymentRow){
                $getPaymentRow->update([
                    'order_status' => $xmlmsg->OrderStatus,
                ]);
            }
        }

        return redirect()->route('site.index')->with('flash_message_error','Ödəniş rədd edildi');
    }


    //Internet shop must perform the Get Order Status operation for the security purposes and decide whether to provide the service or not depending on the response.
    public function getOrderStatus($data){

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                    <Request>
                        <Operation>GetOrderStatus</Operation>
                        <Language>'.$this->language.'</Language>
                        <Order>
                            <Merchant>'.$this->merchant_id.'</Merchant>
                            <OrderID>'.$data->order_id.'</OrderID>
                        </Order>
                        <SessionID>'.$data->session_id.'</SessionID>
                    </Request>
                </TKKPG>';
        $response = $this->curl($xml);

        $xmlmsg = new SimpleXMLElement($response);
        //dd($xmlmsg->Response->Status);
        $getPaymentRow = Payment::where('order_id', '=', $xmlmsg->Response->Order->OrderID)->first();
        if($getPaymentRow){
            $getPaymentRow->update([
                'order_check_status' => $xmlmsg->Response->Order->OrderStatus,
                'status_code' => $xmlmsg->Response->Status,
            ]);
        }
        return $response;
    }

    //paymentLogs in admin
    public function paymentLogs(){
        $rows = Payment::latest()->paginate(20);
        return view('back.settings.payment_logs', compact('rows'));
    }
}
