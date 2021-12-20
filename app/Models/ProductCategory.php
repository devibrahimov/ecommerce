<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $guarded = [] ;

    public function categoryHasChildren($id){
     return $this->where('parent_id',$id)->get();
    }
}
