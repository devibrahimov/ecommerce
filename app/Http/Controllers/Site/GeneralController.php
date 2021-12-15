<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Carousel;
use App\Models\Gallery;
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

        $about = DB::table('about_us')
            ->leftjoin('aboutus_content','about_us.id','=','aboutus_content.about_id')
            ->where('lang',$locale)->first();

        $services = DB::table('services')
            ->leftjoin('services_content','services.id','=','services_content.service_id')
            ->orderBy('desk')->where('lang',$locale)->where('active',1)->get();

        $faqs = DB::table('faqs')
            ->leftjoin('faq_contents','faqs.id','=','faq_contents.faq_id')
            ->orderBy('faq_id','DESC')->where('lang',$locale)->take(6,1)->get();

        $press = DB::table('press')->where('athome',1)->first();

//        $blogs = DB::table('blogs')
//            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
//            ->where('lang',$locale)->take(3,1)->get();

        $blog = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('lang',$locale)->latest()->first();
        $page = 'index';
        return View::make("Template.pages.home",compact(['page','about','carousel','services','press','blog','faqs']));
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

    public function serviceDetail($id,$slug){
        if ( adjustment()->multilang == 1) {
            $locale = LaravelLocalization::getCurrentLocale();
        }
        if ( adjustment()->multilang == 0){
            $locale = adjustment()->default_lang;
        }
        $service  = DB::table('services')
            ->leftjoin('services_content','services.id','=','services_content.service_id')
            ->orderBy('desk')->where('lang',$locale)->where('service_id',$id)->first();
        $randblogs = DB::table('blogs')
            ->leftjoin('blog_contents','blogs.id','=','blog_contents.blog_id')
            ->where('lang',$locale)->inRandomOrder()->get();
        $otherservices = DB::table('services')
            ->leftjoin('services_content','services.id','=','services_content.service_id')
            ->orderBy('desk')->where('lang',$locale)->where('service_id','!=',$id)
            ->where('active',1)->get();
        $meta_content = $service->meta_content ;
        $meta_keywords = $service->meta_keywords ;

        $page = 'service';
        return View::make("Template.pages.serviceDetail",compact(['page', 'service' ,'otherservices','randblogs','meta_content','meta_keywords']));
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

    public function contact(){
        $page = 'contact';
        return View::make("Template.pages.contact" ,compact(['page']));
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
        $categories = ProductCategory::all();

        $products = DB::table('products')->where('category_id',$id)
            ->leftjoin('products_content','products.id','=','products_content.product_id')
            ->leftJoin('products_images', function ($join) {
                $join->on('products.id', '=', 'products_images.product_id')->where('cover','=',1);
            })
            ->where('lang',$locale)->where('active',1)->get();
//        var_dump($products);exit;
        $page = 'products';
        $catid = $id;
        return View::make("Template.pages.products",compact(['categories','products','page','catid']));

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
//var_dump($product);die;
        $page = 'products';
        $catid = $id;
        return View::make("Template.pages.productDetail",compact(['categories','product','page','catid']));
    }




    public function registerform(Request $request){
        var_dump($request->all());
    }
}
