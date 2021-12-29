<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductsController extends Controller
{

    public function allcategories(  $id = null,  $slug = null){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $categories = DB::table('product_categories')
            ->leftjoin('product_categories_content','product_categories.id','=','product_categories_content.base_id')
            ->where('parent_id',$id)->where('lang',$locale)->get();

        return View::make("Template.pages.allcategories",compact(['categories']));
    }

    public function products(){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $categories = ProductCategory::all();

        $products = Product::leftjoin('products_content','products.id','=','products_content.product_id')

            ->where('lang',$locale)->where('active',1)->paginate(20);

        $page = 'products';
        return View::make("Template.pages.products",compact(['categories','products','page']));
    }

    public function productcategory($id,$slug){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $category = DB::table('product_categories')
            ->leftjoin('product_categories_content','product_categories.id','=','product_categories_content.base_id')
            ->where('id',$id)->where('lang',$locale)->first();


        $products = Product::leftjoin('products_content','products.id','=','products_content.product_id')
            ->where('category_id',$id)
            ->where('lang',$locale)->where('active',1)->paginate(20);
        $page = 'products';

        return View::make("Template.pages.products",compact(['category','products','page' ]));

    }

    public function productsearch(Request $request){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }



        $products = Product::leftjoin('products_content','products.id','=','products_content.product_id')
            ->where('name','LIKE','%'.$request->axtaris.'%')
            ->where('lang',$locale)->where('active',1)->paginate(20);
        $page = 'products';

        return View::make("Template.pages.products",compact([ 'products','page' ]));

    }

    public function productDetail($id,$slug){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $categories = ProductCategory::all();

        $product = DB::table('products')
            ->leftjoin('products_content','products.id','=','products_content.product_id')
            ->where('lang',$locale)->find($id);
        $product->images = Product::find($id)->images;
        $product->category = Product::find($id)->category->name;

        $page = 'products';

        return View::make("Template.pages.productDetail",compact(['categories','product','page' ]));
    }



    public function productjson($id){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $product = Product::leftjoin('products_content','products.id','=','products_content.product_id')
            ->where('lang',$locale)->find($id);
        $product->images = Product::find($id)->images;
        $product->category = Product::find($id)->category->name;


        return  json_encode($product, JSON_UNESCAPED_UNICODE );
    }

}
