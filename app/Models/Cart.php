<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Cart extends Model
{
      protected $table = 'customer_cart';
    protected $guarded = [] ;



    public function product(){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        return $this->belongsTo('App\Models\Product' ,'product_id' ,'id')
            ->join('products_content','products.id','=','products_content.product_id')
            ->leftJoin('products_images',function ($join){
                $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
            })
            ->where('lang',$locale);
    }
}
