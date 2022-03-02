<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BirC_ConnectController extends Controller
{

    //consumer_key aaa0c9402fa7539d359abc00b1e8ad51af40b095f165a763680510c5b47402f4
    //consumer_secret cs_9829116bf184bdab46fb34281fb5a9ee16679437
    //permissions read_write
    //truncated_key 88854ac

    public function get(){

        $productsArray = [] ;

        $products = Product::leftjoin('products_content','products.id','=','products_content.product_id')
            ->where('lang','ru')
            ->paginate(100);

        foreach ($products as $product){

            $productdata  = [
                "id" => $product->id,
                "name" => $product->name,
                "slug" => Str::slug($product->name),
                "permalink"=> route('site.productDetail',['id'=>$product->id,'slug'=>\Illuminate\Support\Str::slug($product->name)]),
                "date_created"=>$product->created_at ,
                "description" =>  $product->description ,
                "short_description"=> $product->content ,
                "sku" => $product->sku ,
                "regular_price"=>$product->price ,
                "sale_price"=> $product->sale_price ,
                "categories"=> getProductCategory1C($product->category_id),
                "stock_quantity" => $product->stock ,
                "meta_data"=> $product->meta_content ,
                "stock_status"=> $product->stock <1?"outofstock" :"instock" ,
                "date_on_sale_from"=> null,
                "date_on_sale_from_gmt"=> null ,
                "date_on_sale_to"=> null,
                "date_on_sale_to_gmt"=> null,
                "on_sale" => false,
                "purchasable" => false,
                "total_sales" => 0,
                "virtual" => false,
                "downloadable" => false,
                "downloads"=> [],
                "download_limit"=> -1,
                "download_expiry"=> -1,
                "external_url"=> "" ,
                "button_text"=> "" ,
                "tax_status"=> "taxable" ,
                "tax_class"=> "" ,
                "manage_stock" => true ,
                "backorders"=> "no" ,
                "backorders_allowed"=> false ,
                "backordered"=> false ,
                "sold_individually"=> false ,
                "weight"=> "" ,
                "dimensions"=> "" ,
                "shipping_required"=> true ,
                "shipping_taxable"=> true ,
                "shipping_class"=> "" ,
                "shipping_class_id"=> 0 ,
                "reviews_allowed"=> true ,
                "average_rating"=> "0.00" ,
                "rating_count"=> 0 ,
                "upsell_ids"=> [] ,
                "cross_sell_ids"=> [] ,
                "parent_id"=> 0 ,
                "purchase_note"=> "" ,
                "tags"=> [] ,
                "images" => "" ,
                "attributes"=> [] ,
                "default_attributes"=> [] ,
                "variations"=> [] ,
                "grouped_products"=> [] ,
                "menu_order"=> 0 ,
                "price_html"=> "" ,
                "related_ids"=> [12631,12532,12655,12652,12637] ,
            ];

            array_push($productsArray,$productdata);

        }

        return json_encode($productsArray,JSON_UNESCAPED_UNICODE) ;
    }


    public function update(Request $request){

        foreach ($request->update[0] as $product){

           $data =[
                "sku"=>$product->sku,
                "price"=>$product->price,
                "sale_price"=>$product->price,
                "sale_price"=>$product->price,
                "stock"=>$product->stock_quantity,
                "stock_status"=>"instock"] ;
            Product::where('sku',$product->sku)->update($data);
        }

    }

}
