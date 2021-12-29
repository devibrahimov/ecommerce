<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [] ;


    public function images(){
        return $this->hasMany('App\Models\ProductImage','product_id');
    }

    public function category(){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        return $this->belongsTo('App\Models\ProductCategory' ,'category_id' ,'id')
            ->join('product_categories_content','product_categories.id','=','product_categories_content.base_id')
            ->where('lang',$locale);
    }
}

