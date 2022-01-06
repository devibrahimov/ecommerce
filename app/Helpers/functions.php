<?php

use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * @CompanyURI: https://lumusoft.com
 * @Description: Developed by LUMUSOFT Software team.
 * @Version: 1.0.0
 * @Date :    20.06.2021
 */

    function adjustment(){
        $db = DB::connection() ;
        if (isset($db)){
            if (\Illuminate\Support\Facades\Schema::hasTable('adjustment')){
                $adjustment = \App\Models\Adjustment::first();
                if ($adjustment != null){
                    return $adjustment;
                } else{
                    return  (object) [
                        'multilang' => 0,
                        'default_lang' => 'az',
                        'models' => null
                    ];
                }
            }else{
                return  (object) [
                    'multilang' => 0,
                    'default_lang' => 'az',
                    'models' => null
                ];
            }
        } else{
            return  (object) [
                'multilang' => 0,
                'default_lang' => 'az',
                'models' => null
            ];
        }


    }

    function setting(){
        return \App\Models\Setting::first();
    }

    function contact(){
        return \App\Models\Contact::first();
    }

    function allPages(){

         if ( adjustment()->multilang == 1) {
             $locale = LaravelLocalization::getCurrentLocale();
         }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }


        $otherservices = DB::table('services')
         ->leftjoin('services_content','services.id','=','services_content.service_id')
         ->orderBy('desk')->where('lang',$locale)
         ->where('active',1)->get();
            return $otherservices;
    }

    function allProductCategories(){

         if ( adjustment()->multilang == 1) {
             $locale = LaravelLocalization::getCurrentLocale();
         }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $c= DB::table('product_categories')
         ->leftjoin('product_categories_content','product_categories.id','=','product_categories_content.base_id')
        ->where('lang',$locale)
         ->get();
            return $c;
    }

    function footerproducts(){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }


        return DB::table('products')
            ->leftjoin('products_content','products.id','=','products_content.product_id')
            ->leftJoin('products_images', function ($join) {
                $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
            })
            ->where('lang',$locale)->where('active',1)->latest()->take(2)->get();
    }

    function lastFiveBlogs(){

         if ( adjustment()->multilang == 1) {
             $locale = LaravelLocalization::getCurrentLocale();
         }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $otherblogs = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
         ->orderBy('blog_id','DESC')->where('lang',$locale)->take(5,1)->get();
            return $otherblogs;
    }

    /*
     * IMAGE COMPRESS FUNCTION
     */
    function compressImage($data) {
        $info = getimagesize($data['source']);

    if ($info['mime'] == 'image/jpeg'){
        $image = imagecreatefromjpeg($data['source']);

        $imagesize = filesize($data['source']) ;

        if ($imagesize >= 1500000)
        return    imagejpeg($image, $data['destination'], 35);

        if ($imagesize >= 1000000)
         return   imagejpeg($image, $data['destination'],40);

        if ($imagesize >= 50000)
        return    imagejpeg($image, $data['destination'], 60);

        if ($imagesize < 50000)
         return   imagejpeg($image, $data['destination'] );

    }

//    elseif ($info['mime'] == 'image/png') {
//        $image = imagecreatefrompng($data['source']);
//
//        $imagesize = filesize($data['source']) ;
//
//        if ($imagesize >= 1500000)
//            imagepng($image, $data['destination'], 9);
//
//        if ($imagesize >= 1000000)
//            imagepng($image, $data['destination'],9);
//
//        if ($imagesize >= 50000)
//            imagepng($image, $data['destination'], 9);
//
//        if ($imagesize <= 35000)
//            imagepng($image, $data['destination'], 9);
//    }
}

function makedirectory($dirpath){

    $direcoties =  explode('/',$dirpath);

    $path = '';
    if (!file_exists($dirpath) ) {

        foreach ($direcoties as $dir){

            if (!file_exists(public_path($path.'/'.$dir))) {
                mkdir( public_path($path.'/'.$dir), 0777, true);
            }
            $path.='/'.$dir;
        }
    }
    //echo $path ;
}

function deleteimage($imagepath ){
    if(file_exists($imagepath)){
        unlink($imagepath );
    }



}
function hasmywishlist($productid,$userid){
   $result = \App\Models\Wishlist::where('user_id',$userid)->where('product_id',$productid)->first();
      if ($result !=null){
          return true;

      }else{
          return false;
      }
    }

    function randomproductslist(){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

      return  \App\Models\Product::leftjoin('products_content','products.id','=','products_content.product_id')
            ->where('lang',$locale)
            ->leftjoin('products_images',function($join){
                $join->on('products.id','=','products_images.product_id')->where('cover',1);
            })->inRandomOrder()->take(6)->get();

    }


    function rateStars($id){
       $rates = \App\Models\Rate::where('product_id',$id)->select('rate')->get()->toArray();

        $total = 0 ;
        if ($rates != []){

            foreach ($rates as  $v) {
                $total +=$v['rate'];
            }
            $total /= count($rates) ;
        }
       // return round($total) ;
        $total = round($total) ;
        $stars = '';
        for($i=1; $i<=5; $i++){
            if ( $i <= $total ){
                $stars.=' <span  class="jquery-ratings-star jquery-ratings-full"  style="font-size:100%;" >&starf;</span>';
            }else{
                $stars.=' <span  class="jquery-ratings-star "  style="font-size:100%;color: dimgrey" >&starf;</span>';
            }

        }

        return $stars ;
    }
