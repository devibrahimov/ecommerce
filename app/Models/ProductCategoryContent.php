<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryContent extends Model
{
    protected $table = 'product_categories_content';
    protected $primaryKey = 'content_id';
    public $incrementing = true;
    protected $guarded = [] ;
}
