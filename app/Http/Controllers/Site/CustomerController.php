<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{


    public function profil(){
        $customer =  Auth::guard('customer')->user()->name;
       return view('Template.pages.customer.profil ');
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
}
