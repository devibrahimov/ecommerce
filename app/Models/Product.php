<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [] ;


    public function images(){
        return $this->hasMany('App\Models\ProductImage');
    }
}
