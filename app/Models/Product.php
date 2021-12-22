<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [] ;


    public function images(){
        return $this->hasMany('App\Models\ProductImage','product_id');
    }
}

//
//->leftJoin('products_images', function ($join) {
//    $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
//})
