<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Carousel;
use App\Models\Gallery;
use App\Models\Language;
use App\Models\Message;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GeneralController extends Controller
{

    public function index(){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $carousel =  Carousel::where('active',1)->get() ;
//            ->rightjoin('carousel_content','carousel.id','=','carousel_content.carousel_id')
//            ->orderBy('desk')->where('active',1)->get();

        $page = 'index';
        return View::make("Template.pages.home",compact(['page', 'carousel' ]));
    }


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


    //sehhifeler edildi burda
    public function services(){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $services = DB::table('services')
            ->leftjoin('services_content','services.id','=','services_content.service_id')
            ->orderBy('desk')->where('lang',$locale)->where('active',1)->get();
        $page = 'service';
        return View::make("Template.pages.services",compact(['page', 'services' ]));
    }

    public function serviceDetail($slug){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $service  = DB::table('services')
            ->leftjoin('services_content','services.id','=','services_content.service_id')
            ->orderBy('desk')->where('lang',$locale)->where('slug',$slug)->first();

        if ($service == null){
            $service  = DB::table('services')
                ->leftjoin('services_content','services.id','=','services_content.service_id')
                ->orderBy('desk')->where('slug',$slug)->where('lang','az')->first();

        }
        if ($service->meta_content != null){
            $meta_content = $service->meta_content ;
        }else{
            $meta_content = setting()->meta_content ;
        }

        if (  $service->meta_keywords != null){
            $meta_keywords = $service->meta_keywords ;
        }else{
            $meta_keywords =setting()->meta_keywords ;
        }



        $page = 'service';
        return View::make("Template.pages.page",compact(['page', 'service' ,'meta_content','meta_keywords']));
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

            ->where('lang',$locale)->where('active',1)->get();

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

//        $products = DB::table('products')->where('category_id',$id)
//            ->leftjoin('products_content','products.id','=','products_content.product_id')
//            ->leftJoin('products_images', function ($join) {
//                $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
//            })
//
//            ->where('lang',$locale)->where('active',1)->get();
//

        $products = Product::leftjoin('products_content','products.id','=','products_content.product_id')
            ->where('category_id',$id)
            ->where('lang',$locale)->where('active',1)->paginate(20);
        $page = 'products';

        return View::make("Template.pages.products",compact(['category','products','page' ]));

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

        $page = 'products';
        $catid = $id;
        return View::make("Template.pages.productDetail",compact(['categories','product','page','catid']));
    }

    public function contact(){
        $page = 'contact';
        return View::make("Template.pages.contact" ,compact(['page']));
    }




    public function about(){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $about = DB::table('about_us')
            ->leftjoin('aboutus_content','about_us.id','=','aboutus_content.about_id')
            ->where('lang',$locale)->first();
        $page = 'about';
        return View::make("Template.pages.about",compact(['page','about' ]));

    }

    public function faq(){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $faqs = DB::table('faqs')
            ->leftjoin('faq_contents','faqs.id','=','faq_contents.faq_id')
            ->where('lang',$locale)->get();
        $page = 'faq';
        return View::make("Template.pages.faqpage",compact(['page','faqs' ]));

    }

    public function press(){

        $press = DB::table('press')->get();

        return View::make("Template.pages.press",compact(['press' ]));

    }

    public function blogs(){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $blogs = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('lang',$locale)->paginate(5);
        $randblogs = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('lang',$locale)->inRandomOrder()->get();

        $categories = DB::table('blogcategories')
            ->leftjoin('blogcategory_contents','blogcategories.id','=','blogcategory_contents.base_id')
            ->where('lang',$locale)->get();
        $page = 'blog';
        return View::make("Template.pages.blogspage",compact([ 'page','blogs','categories','randblogs']));
    }

    public function blogcat($id,$slug){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $blogs = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('lang',$locale)->where('category',$id)->paginate(5);
        $randblogs = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('lang',$locale)->inRandomOrder()->get();

        $categories = DB::table('blogcategories')
            ->leftjoin('blogcategory_contents','blogcategories.id','=','blogcategory_contents.base_id')
            ->where('lang',$locale)->get();
        $page = 'blog';
        return View::make("Template.pages.blogspage",compact(['page', 'blogs','categories','randblogs']));
    }

    public function blogdetail($id,$lug){

        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }

        $blog = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('blog_id',$id)->where('lang',$locale)->first();

        $randblogs = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('lang',$locale)->inRandomOrder()->get();

        $categories = DB::table('blogcategories')
            ->leftjoin('blogcategory_contents','blogcategories.id','=','blogcategory_contents.base_id')
            ->where('lang',$locale)->get();
            $page = 'blog';
        return View::make("Template.pages.blogdetail",compact(['page','blog','categories','randblogs']));
    }


    public function gallery(){
        $gallery = Gallery::all();
        $page = 'gallery';
        return View::make("Template.pages.gallery",compact(['page','gallery']));

    }


    public function sendmessage(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|max:255',
            'number' => 'required|max:255',
            'message' => 'required',
        ] );
        try {
            if ($validatedData){
                DB::table('message')->insert([
                    'name' => request('name'),
                    'surname' => request('surname'),
                    'email' => request('email'),
                    'number' => request('number'),
                    'content' => request('message'),
                ]);
                $feedbackdata = ['title' => 'Mesajınız Uğurla göndərildi !',
                    'text' => 'Mesajınız Uğurla göndərildi.Ən qısa Zamanda sizə geri dönüş ediləcək' ,
                    'icon' => 'success',
                    'button' => 'Bağla',];

                return back()->with('feedback', $feedbackdata);
            }
        }catch (\Exception $exception){

            $feedbackdata = ['title' => 'Mesajınız göndərilmədi !',
                'text' => 'Mesajınız göndərilərkən xəta baş verdi xahiş edirik yeniden yoxlayın. Xəta : '.$exception->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];

            return back()->with('feedback', $feedbackdata);
        }

    }

    public function registerform(Request $request){
        var_dump($request->all());
    }
}
