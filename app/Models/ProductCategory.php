<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $guarded = [] ;

    public function categoryHasChildren($id){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
     return DB::table('product_categories')->where('parent_id',$id)->leftjoin('product_categories_content','product_categories.id','=','product_categories_content.base_id')
            ->where('lang',$locale)->get();
    }

    public function children(){
        return $this->hasMany(self::class , 'parent_id');
    }

    public function parents(){
        return $this->belongsTo(self::class , 'id');
    }

    public function thiscategory($id){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        return DB::table('product_categories')->leftjoin('product_categories_content','product_categories.id','=','product_categories_content.base_id')
            ->where('id',$id)->where('lang',$locale)->first();
    }
}
