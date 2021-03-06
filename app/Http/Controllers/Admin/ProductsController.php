<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryContent;
use App\Models\ProductImage;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductsController extends Controller
{
    ################################################################
    #        Products Category  SECTION
    ################################################################
    public function product_categories($id =null){

            $items = ProductCategory::where('parent_id',$id)->get();


        return view('Admin.pages.products.categories',compact(['items','id']));
    }


    public function product_category_store(Request $request,$id=null){
        try {
            $productcat = new ProductCategory();

            $image = $request->file('image');

            #image upload
            if ($image) {
                $path = "/photos/categories/";
                $imagepath = public_path() . $path;
                if ($image->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();

                    $location = $imagepath . '/' . $newimagename;
                    $imageurl = $path . '/' . $newimagename; //for DB
                    makedirectory($path);
                    $response = compressImage(['source' => $image, 'destination' => $location]);
                    if ($response != true){
                        $image->move($imagepath, $newimagename);
                    }
                }
                $productcat->image = $imageurl;
            }

            $productcat->show = 0 ;
            $productcat->parent_id = $id ;

            $productcat->save() ;

            $datacontent = [];
            foreach (languages() as $lang) {
                $lang = $lang->code;

                $name= request('name_' . $lang);
                if ($lang != null and $name!= null) {
                    $data = [
                        'base_id' => $productcat->id,
                        'lang' => $lang,
                        'name' => $name,

                    ];
                    array_push($datacontent, $data);
                }
            }

            DB::table('product_categories_content')->insert($datacontent);
            $feedbackdata = ['title' => 'Ba??ar??l?? !',
                'text' => 'M??hsul Kategoriyas?? yadda??a yaz??ld??',
                'icon' => 'success',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);
        }catch (\Exception $e){
            $feedbackdata = ['title' => 'Ba??ar??s??z !',
                'text' => ' M??hsul Kategoriyas?? ??lav?? edil??rk??n x??ta ba?? verdi . X??TA : '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Ba??la',];

            return back()->with('feedback', $feedbackdata);
        }
    }

    public function product_category_update($id,Request $request){

        # step 1_________________________;
        try {
            $ProductCategory = ProductCategory::find($id);
            $image = $request->file('image');

            #image upload
            if ($image) {
                $path = "/photos/categories/";
                $imagepath = public_path() . $path;
                if ($image->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();

                    $location = $imagepath . '/' . $newimagename;
                    $imageurl = $path . '/' . $newimagename; //for DB
                    makedirectory($path);
                    $response = compressImage(['source' => $image, 'destination' => $location]);
                    if ($response != true){
                        $image->move($imagepath, $newimagename);
                    }
                }
                $ProductCategory->image = $imageurl;
            }

            $ProductCategory->parent_id = $request->parent;
            $ProductCategory->save();
        # end step 1_________________________;
            $productcategory_content = DB::table('product_categories_content')->where('base_id', $id)->get();
            $datacontent = [];

            if ($productcategory_content->isEmpty()) {
                foreach (languages() as $lang) {
                    $lang = $lang->code;
                    $name = request('name_' . $lang);
                    if ($name != null) {
                        $data = [
                            'base_id' => $id,
                            'lang' => $lang,
                            'name' => $name,
                        ];
                        array_push($datacontent, $data);
                    }
                }
            }

            else {

                foreach (languages() as $lang) {
                    $thisrow = DB::table('product_categories_content')->where('base_id', $id)->where('lang',$lang->code)->first();

                    if ( $thisrow != NULL) {
                        $name = request('name_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'base_id' => $ProductCategory->id,
                                'lang' => $lang->code,
                                'name' => $name,
                            ];
                            DB::table('product_categories_content')->where('content_id',$thisrow->id)->update($data);
                        }//end if null

                    }

                    else {//endif language code
                        $name = request('name_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'base_id' => $ProductCategory->id,
                                'lang' => $lang->code,
                                'name' => $name,

                            ];
                            array_push($datacontent, $data);
                        }
                    }//else



                }

            }//else
            DB::table('product_categories_content')->insert($datacontent);

            $feedbackdata = ['title' => 'Ba??ar??l?? !',
                'text' => 'M??hsul Kategorisi u??urla redakt?? edildi',
                'icon' => 'success',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Ba??ar??s??z !',
                'text' => 'M??hsul Kategorisi redakt?? edil??rk??n x??ta ba?? verdi. X??ta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);

        }//end cache
    }

    public function product_category_delete($id){

        DB::beginTransaction();
        try {

            $ProductCategory = ProductCategory::find($id);

            $ProductCategory->delete();
            ProductCategoryContent::where('base_id',$id)->delete();
            DB::commit();

            $feedbackdata = ['title' => 'Ba??ar??l?? !',
                'text' => 'M??hsul Kategorisi u??urla silindi',
                'icon' => 'success',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){
            DB::rollBack();

            $feedbackdata = ['title' => 'Ba??ar??s??z !',
                'text' => 'M??husl Site M??hsul Kategorisi silin??rk??n x??ta ba?? verdi. X??ta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);
        }

    }
    ################################################################
    #        End Product Category  SECTION
    ################################################################


    ################################################################
    #        productS SECTION
    ################################################################

    public function products(){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $categories = ProductCategory::all();

        $products = DB::table('products')
            ->leftjoin('products_content','products.id','=','products_content.product_id')
            ->leftJoin('products_images', function ($join) {
                $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
            })
            ->where('lang',$locale)->paginate(20);

        return view('Admin.pages.products.index',compact(['products','categories']));
    }

//Go_art!2022 //gobustanrockart //gobustan-rockart.az
//$#rf#@rA$i aniaz
    public function admincatproducts($id){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $categories = ProductCategory::all();

        $products = DB::table('products')
            ->where('category_id','LIKE','%'.$id.'%')
            ->leftjoin('products_content','products.id','=','products_content.product_id')
            ->leftJoin('products_images', function ($join) {
                $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
            })
            ->where('lang',$locale)->paginate(20);

        return view('Admin.pages.products.index',compact(['products','categories']));
    }

    public function newproduct(){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $categories = ProductCategory::leftjoin('product_categories_content','product_categories.id','=','product_categories_content.base_id')
            ->where('lang',$locale)->where('parent_id',null)->get();
        return view('Admin.pages.products.create',compact(['categories']));
    }

    public function productstore(Request $request){

        DB::beginTransaction();
        try {
            $product = new Product();
            $category = getcategorieslist($request->category);

            $product->category_id = json_encode($category);
         //   $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->stock = $request->stock;
            $product->sku = $request->sku;
            $product->save();

            #image upload
            $images = $request->file('image');
            if ($images) {
                $imagelist = array();

                $path = "/photos/products";
                $imagepath = public_path() . $path;

                foreach($images as $key => $image){
                    if ($image->isValid()) {
                        $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();

                        $location = $imagepath . '/' . $newimagename;
                        $imageurl = $path . '/' . $newimagename;//for DB

                        makedirectory($path);
                        $response =   compressImage(['source' => $image, 'destination' => $location]);

                        if ($key == 0){ $cover = 1;  }else{ $cover = 0; }
                        $row = [
                            'product_id' =>$product->id,
                            'imagepath' =>$imageurl,
                            'cover' => $cover
                        ];

                        $image->move($imagepath, $newimagename);
                        array_push($imagelist,$row);
                    }//end if
                }//end foreach
                DB::table('products_images')->insert($imagelist);
            }//end if

            $datacontent = [];
            foreach (languages() as $lang) {
                $lang = $lang->code;

                $name = request('name_' . $lang);
                $content = request('content_' . $lang);
                $description = request('description_' . $lang);
                $metacontent = request('metacontent_' . $lang);
                $metakeywords = request('metakeywords_' . $lang);

                if ($lang != null and $name != null) {
                    $data = [
                        'product_id' => $product->id,
                        'lang' => $lang,
                        'name' => $name,
                        'content' => $content,
                        'description' => $description,
                        'meta_content' => $metacontent,
                        'meta_keywords' => $metakeywords
                    ];
                    array_push($datacontent, $data);
                }
            }

            DB::table('products_content')->insert($datacontent);

        } catch (\Exception $exception) {
            DB::rollBack();
            $feedbackdata = ['title' => 'Ba??ar??s??z !',
                'text' => 'M??hsullar m??lumatlar?? yadda??a yaz??lark??n x??ta ba?? verdi xahi?? edirik yeniden yoxlay??n. ERROR : '.$exception->getMessage(),
                'icon' => 'warning',
                'button' => 'Ba??la',];

            return back()->with('feedback', $feedbackdata);
        }
        DB::commit();
        $feedbackdata = ['title' => 'Ba??ar??l?? !',
            'text' => 'M??hsullar m??lumatlar?? yadda??a yaz??ld??',
            'icon' => 'success',
            'button' => 'Ba??la',];
        return back()->with('feedback', $feedbackdata);

    } //end productstore

    public function productedit($id){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $product = Product::find($id);
        $product->content = DB::table('products_content')->where('product_id',$id)->get();
        $product->images = ProductImage::where('product_id',$id)->get();
        $categories = ProductCategory::leftjoin('product_categories_content','product_categories.id','=','product_categories_content.base_id')
            ->where('lang',$locale)->where('parent_id',null)->get();

        return view('Admin.pages.products.edit',compact(['product','categories']));
    }//end productedit


    public function productupdate($id, Request $request)
    {
        try {

            $product = Product::find($id);
            $category = getcategorieslist($request->category);

            $product->category_id = json_encode($category);
//            $product->price = $request->price;
             $product->sale_price = $request->sale_price;
            $product->stock = $request->stock;
            $product->sku = $request->sku;

            $product->save();
            # end step 1_________________________;
            $product_content = DB::table('products_content')->where('product_id', $id)->get();
            $datacontent = [];

            if ($product_content->isEmpty()){
                foreach (languages() as $lang) {
                    $lang = $lang->code;
                    $name = request('name_' . $lang);
                    $content = request('content_' . $lang);
                    $description = request('description_' . $lang);
                    $metacontent = request('metacontent_' . $lang);
                    $metakeywords = request('metakeywords_' . $lang);

                    if ($name != null) {
                        $data = [
                            'product_id' => $product->id,
                            'lang' => $lang,
                            'name' => $name,
                            'content' => $content,
                            'description' => $description,
                            'meta_content' => $metacontent,
                            'meta_keywords' => $metakeywords
                        ];
                        array_push($datacontent, $data);
                    }
                }
            }

            else {
                foreach (languages() as $lang) {
                    $thisrow = DB::table('products_content')->where('product_id', $id)->where('lang',$lang->code)->first();

                    if ( $thisrow != NULL) {
                        $name = request('name_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $description = request('description_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'product_id' => $product->id,
                                'lang' => $lang->code,
                                'name' => $name,
                                'content' => $content,
                                'description' => $description,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            DB::table('products_content')->where('content_id',$thisrow->content_id)->update($data);
                        }//end if null
                    }

                    else {//endif language code
                        $name = request('name_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $description = request('description_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'product_id' => $product->id,
                                'lang' => $lang->code,
                                'name' => $name,
                                'content' => $content,
                                'description' => $description,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            array_push($datacontent, $data);
                        }
                    }//else
                }
            }//else
            DB::table('products_content')->insert($datacontent);

            $feedbackdata = ['title' => 'Ba??ar??l?? !',
                'text' => 'Xidm??t m??lumatlar?? u??urla redakt?? edildi',
                'icon' => 'success',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Ba??ar??s??z !',
                'text' => 'M??hsul m??lumatlar?? redakt?? edil??rk??n x??ta ba?? verdi. X??ta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);

        }//end catche

    }//end productupdate

    public function productimageupload(Request $request){

        $image = $request->file('file');

        $path = "/photos/products";
        $imagepath = public_path() . $path;

            $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();

            $location = $imagepath . '/' . $newimagename;
            $imageurl = $path . '/' . $newimagename;//for DB

            makedirectory($path);
            $response =   compressImage(['source' => $image, 'destination' => $location]);

            $image->move($imagepath, $newimagename);


        if ($request->image_id ==null){
            $data = [
                'product_id' => $request->product_id,
                'imagepath' =>  $imageurl
            ];
             DB::table('products_images')->insert($data);

        }else{
            $data = [
                'imagepath' =>  $imageurl
            ];
            DB::table('products_images')->where('image_id',$request->image_id)->update($data);

        }
    }

    function productimagedelete(Request $request){
       $image =  ProductImage::find($request->image_id);
       $delimgfile = deleteimage(public_path($image->imagepath));
       $image->delete();

    }


    public function productdelete($id){

        DB::beginTransaction();
        try {

            $product = Product::find($id);

            $images = ProductImage::where('product_id',$id)->get();
            foreach ($images as $img){
                deleteimage(public_path($img->imagepath));
                $img->delete();
            }

            DB::table('products_content')->where('product_id',$id)->delete();
            $product->delete();

            DB::commit();

            $feedbackdata = ['title' => 'Ba??ar??l?? !',
                'text' => 'Xidm??t u??urla silindi',
                'icon' => 'success',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){
            DB::rollBack();

            $feedbackdata = ['title' => 'Ba??ar??s??z !',
                'text' => 'M??hsul m??lumatlar?? silin??rk??n x??ta ba?? verdi. X??ta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Ba??la',];
            return back()->with('feedback', $feedbackdata);
        }

    }

    public function productactivestatus(Request $request){

        try {

            if ($request->active == 'true'):
            $status = 1;
            else:
            $status = 0;
            endif;
            $product = Product::find($request->product_id);
            $product->active = $status;
            $product->save();

            $feedbackdata = ['title' => 'Ba??ar??l?? !',
                'text' => 'M??hsul u??urla Yay??nland?? ',
                'icon' => 'success',
                'button' => 'Ba??la',];
            return $feedbackdata;

        }catch (\Exception $e){


            $feedbackdata = ['title' => 'Ba??ar??s??z !',
                'text' => 'M??hsul yay??nlanark??n x??ta ba?? verdi. X??ta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Ba??la',];
            return $feedbackdata;
        }

    }

    ################################################################
    #        END  product SECTION
    ################################################################



    public function comments(){
        $comments = Rate::all();
        return view('Admin.pages.products.comments',compact('comments'));
    }

    public function commentAdminFeedback(Request $request){
        $feedback = $request->feedback ;
        $crid = $request->crid ;

        if ( $request->see){
            $rate = Rate::find(['id'=>$crid]);
            $rate[0]->update([
                'see'=>1
            ]);
        }else{
            $rate = Rate::find(['id'=>$crid]);
            $rate[0]->update([
                'feedback'=>$feedback
            ]);
            return  $rate[0]->feedback ;
        }

    }

}
