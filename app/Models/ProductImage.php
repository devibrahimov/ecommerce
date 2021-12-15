<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'products_images';
    protected $primaryKey = 'image_id';
    public $incrementing = true;
    protected $guarded = [] ;


    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
