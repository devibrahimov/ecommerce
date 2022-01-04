<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CustomerController extends Controller
{


    public function profil(){
        $customer =  Auth::guard('customer')->user()->name;
        $user = Customer::find(Auth::guard('customer')->user()->id);
       return view('Template.pages.customer.profil ',compact(['user']));
    }

    public function addtowishlist(Request $request){
        $customer =  Auth::guard('customer')->user()->id;
        $product =  $request->product_id ;

       $hasdata = Wishlist::where('user_id',$customer)->where('product_id',$product)->first();
       if ($hasdata){
          $delete =  Wishlist::find($hasdata->id);
           $delete = $delete->delete();
          if ($delete){

              $feedbackdata = json_encode(['title' => 'Başarılı !',
                  'text' => 'Bu mehsul favorilerimden cixarildi',
                  'icon' => 'warning',
                  'button' => 'Bağla' ],JSON_UNESCAPED_UNICODE);
              return  $feedbackdata ;
          }else{
              $feedbackdata = json_encode(['title' => 'Başarılı !',
                  'text' => 'Bu mehsul favorilerimden cixarilarken bir xeta oldu',
                  'icon' => 'danger',
                  'button' => 'Bağla' ],JSON_UNESCAPED_UNICODE);
              return  $feedbackdata ;
          }

       }else{
           $data = [
               'user_id'=>$customer,
               'product_id' => $product
           ];
           $responce = Wishlist::create($data);
           if ($responce){
               $feedbackdata = json_encode(['title' => 'Başarılı !',
                   'text' => 'Bu mehsul favorilerime elave edildi',
                   'icon' => 'success',
                   'button' => 'Bağla' ],JSON_UNESCAPED_UNICODE);
               return  $feedbackdata ;
           }else{
               $feedbackdata = json_encode(['title' => 'Başarılı !',
                   'text' => 'Bu mehsul favorilerə əlavə edərkən bir xeta oldu',
                   'icon' => 'danger',
                   'button' => 'Bağla' ],JSON_UNESCAPED_UNICODE);
               return  $feedbackdata ;
           }
       }
    }
    public function wishlist(){
        $customer =  Auth::guard('customer')->user()->id;
        $wishlist = Wishlist::where('user_id',$customer)->get();
       // var_dump($wishlist);
        return view('Template.pages.customer.wishlist', compact(['wishlist']));
    }



    public function addtocart(Request $request){
        $customer_id =  Auth::guard('customer')->user()->id;
        $product =  $request->product_id ;
        $quantity =  $request->qty ;

        $hasdata = Cart::where('customer_id',$customer_id)->where('product_id',$product)->first();

        if ($hasdata){
            $item =  Cart::find($hasdata->id);
            $item->quantity+=$quantity;
            $responce= $item->save();
            if ($responce){
                $responce=true;
            }else{
                $responce=false;
            }
        }else{

            $data = [
                'customer_id'=>$customer_id,
                'product_id' => $product,
                'quantity' => $quantity
            ];
            $responce = Cart::create($data);
            if ($responce){
                $responce=true;
            }else{
                $responce=false;
            }
        }

        if ($responce==true){
            $feedbackdata = json_encode(['title' => 'Başarılı !',
                'text' => 'Mehsul sebete elave edildi',
                'icon' => 'success',
                'button' => 'Bağla' ],JSON_UNESCAPED_UNICODE);
            return  $feedbackdata ;
        }else{
            $feedbackdata = json_encode(['title' => 'Başarılı !',
                'text' => 'Mehsul sebete əlavə edərkən bir xeta oldu',
                'icon' => 'danger',
                'button' => 'Bağla' ],JSON_UNESCAPED_UNICODE);
            return  $feedbackdata ;
        }
    }
    public function removefromcart(Request $request){
        $customer_id =  Auth::guard('customer')->user()->id;
        $id =  $request->id ;

        return Cart::where('customer_id',$customer_id)->where('id',$id)->delete();

    }



    public function mycartpage(){
        return view('Template.pages.customer.cart');
    }

    public function getmycart(){
          if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $customer =  Auth::guard('customer')->user()->id;

        $products = Cart::where('customer_id',$customer)
                        ->join('products','products.id','=','customer_cart.product_id')
                        ->join('products_content','customer_cart.product_id', '=', 'products_content.product_id')->where('lang',$locale)
                        ->leftJoin('products_images',function($join){
                        $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
                         })
                        ->orderBy('customer_cart.id', 'desc')->take(5)
                        ->get(['products.*','products_content.*','products_images.*','customer_cart.*','customer_cart.id AS cart_id']);

        return  json_encode($products, JSON_UNESCAPED_UNICODE );
    }


}
