<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CheckoutController extends Controller
{
    public function checkout(){
            if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $customer =  Auth::guard('customer')->user()->id;

        $cartproducts = Cart::where('customer_id',$customer)
            ->join('products','products.id','=','customer_cart.product_id')
            ->join('products_content','customer_cart.product_id', '=', 'products_content.product_id')->where('lang',$locale)
            ->leftJoin('products_images',function($join){
                $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
            })
            ->orderBy('customer_cart.id', 'desc')->take(5)
            ->get(['products.*','products_content.*','products_images.*','customer_cart.*','customer_cart.id AS cart_id']);


        return view('Template.pages.customer.checkout',compact(['cartproducts']));
    }

}
