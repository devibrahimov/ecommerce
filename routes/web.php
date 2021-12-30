<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::group(['prefix'=>'idare-etme-paneli'],function (){
        Route::get('/giris','UserController@login')->name('login');
        Route::post('/giris','UserController@logincontrol');

    Route::group(['middleware'=>'administrator'],function (){
        Route::post('/cixis','UserController@logout')->name('adminlogoutform');
        Route::get('/kur-mezenneleri','Admin\ApiController@getCurrencies')->name('getCurrencies');

        Route::get('/mesajlar','Admin\OtherController@messages')->name('messages');
        Route::get('/mesajlar/{id}','Admin\OtherController@messageread')->name('messageread');
        Route::delete('/mesaj-sil/{id}','Admin\OtherController@messagedelete')->name('messagedelete');

        Route::get('/','Admin\GeneralController@index')->name('admin.index');
        Route::get('/dil-tənzimləmələri','Admin\LanguageController@languageSetting')->name('languageSetting');
        Route::get('/dil-tənzimləmələri/{language}','Admin\LanguageController@languageEdit')->name('languageEdit');
        Route::post('/dil-faylı','Admin\LanguageController@getlangfile')->name('getlangfile');
        Route::post('/dil-faylı-redaktesi','Admin\LanguageController@editlangfile')->name('editlangfile');

        Route::get('/manset-karusel','Admin\GeneralController@carousels')->name('admincarousels');
        Route::get('/yeni-manset-yarat','Admin\GeneralController@newcarousel')->name('newcarousel');
        Route::post('/yeni-manset-yarat','Admin\GeneralController@carouselstore');
        Route::get('/manset-redaktəsi/{id}','Admin\GeneralController@carouseledit')->name('carouselupdate');
        Route::post('/manset-redaktəsi/{id}','Admin\GeneralController@carouselupdate');
        Route::delete('/manset-sil/{id}','Admin\GeneralController@carouseldelete')->name('carouseldelete');
        Route::get('/manset-aktifet/{id}','Admin\GeneralController@carouselactive')->name('carouselactive');
        Route::get('/manset-deaktifet/{id}','Admin\GeneralController@carouseldeactive')->name('carouseldeactive');

        Route::get('site-tənzimləmələri','Admin\GeneralController@sitesetting')->name('sitesetting');
        Route::post('site-tənzimləmələri','Admin\GeneralController@sitesettingstore');
        Route::post('site-tənzimləmələri-edit','Admin\GeneralController@sitesettingupdate')->name('sitesettingupdate');

        Route::get('site-bizimle-elaqe','Admin\GeneralController@contact')->name('admincontact');
        Route::post('site-bizimle-elaqe','Admin\GeneralController@contacttore');
        Route::post('site-bizimle-elaqe-edit','Admin\GeneralController@contactupdate')->name('admincontactupdate');

        Route::get('admin-isdifadeciler','UserController@adminusers')->name('adminusers');
        Route::post('admin-isdifadeciler','UserController@adminusersstore') ;
        Route::post('admin-isdifadeciler/{id}','UserController@adminusersupdate')->name('adminusersupdate') ;
        Route::delete('/admin-sil/{id}','UserController@userdelete')->name('userdelete');

        Route::get('/haqqımızda','Admin\CorporateController@aboutus')->name('adminaboutus');
        Route::post('/haqqımızda','Admin\CorporateController@aboutusstore');
        Route::post('/haqqımızda/{id}','Admin\CorporateController@aboutusupdate')->name('adminaboutusupdate');

        Route::get('/sehifeler','Admin\CorporateController@services')->name('adminservices');
        Route::get('/yeni-sehife-yarat','Admin\CorporateController@newservice')->name('newservice');
        Route::post('/yeni-sehife-yarat','Admin\CorporateController@servicestore');
        Route::get('/sehife-redaktəsi/{id}','Admin\CorporateController@serviceedit')->name('serviceupdate');
        Route::post('/sehife-redaktəsi/{id}','Admin\CorporateController@serviceupdate');
        Route::delete('/sehife-sil/{id}','Admin\CorporateController@servicedelete')->name('servicedelete');
        Route::get('/sehife-active/{id}','Admin\CorporateController@serviceactive')->name('serviceactive');
        Route::get('/sehife-deactive/{id}','Admin\CorporateController@servicedeactive')->name('servicedeactive');


//        Route::get('/xidmətlərimiz','Admin\CorporateController@services')->name('adminservices');
//        Route::get('/yeni-xidmət-yarat','Admin\CorporateController@newservice')->name('newservice');
//        Route::post('/yeni-xidmət-yarat','Admin\CorporateController@servicestore');
//        Route::get('/xidmət-redaktəsi/{id}','Admin\CorporateController@serviceedit')->name('serviceupdate');
//        Route::post('/xidmət-redaktəsi/{id}','Admin\CorporateController@serviceupdate');
//        Route::delete('/xidmət-sil/{id}','Admin\CorporateController@servicedelete')->name('servicedelete');
//        Route::get('/xidmət-active/{id}','Admin\CorporateController@serviceactive')->name('serviceactive');
//        Route::get('/xidmət-deactive/{id}','Admin\CorporateController@servicedeactive')->name('servicedeactive');
//

        Route::get('/mehsul-kategoriyası/{id?}','Admin\ProductsController@product_categories')->name('product_categories');
        Route::post('/mehsul-kategoriyası/{id?}','Admin\ProductsController@product_category_store') ;
        Route::post('/mehsul-kategoriyası-update/{id}','Admin\ProductsController@product_category_update')->name('product_category_update') ;
        Route::delete('/mehsul-kategoriyası-sil/{id}','Admin\ProductsController@product_category_delete')->name('productcatdelete');

        Route::get('/mehsullarimiz','Admin\ProductsController@products')->name('adminproducts');
        Route::get('/mehsullarimiz/{id}','Admin\ProductsController@admincatproducts')->name('admincatproducts');
        Route::get('/yeni-mehsul-yarat','Admin\ProductsController@newproduct')->name('newproduct');
        Route::post('/yeni-mehsul-yarat','Admin\ProductsController@productstore');
        Route::get('/mehsul-redaktəsi/{id}','Admin\ProductsController@productedit')->name('productupdate');
        Route::post('/mehsul-redaktəsi/{id}','Admin\ProductsController@productupdate');
        Route::delete('/mehsul-sil/{id}','Admin\ProductsController@productdelete')->name('productdelete');
        Route::post('/mehsul-active-status','Admin\ProductsController@productactivestatus')->name('productactivestatus');
        Route::post('/mehsul-shekil-update','Admin\ProductsController@productimageupload')->name('productimageupload');
        Route::post('/mehsul-shekil-sil','Admin\ProductsController@productimagedelete')->name('productimagedelete');

        Route::get('/qaleriya','Admin\GeneralController@gallery')->name('gallery');
        Route::post('/qaleriya','Admin\GeneralController@gallerystore');
        Route::get('/qaleriya-sekil','Admin\GeneralController@galleryfetch')->name('gallery.fetch') ;
        Route::get('/qaleriya-sil','Admin\GeneralController@gallerydelete')->name('gallery.delete') ;

        Route::get('/metbuat','Admin\CorporateController@adminpress')->name('adminpress');
        Route::post('/metbuat','Admin\CorporateController@adminpressstore') ;
        Route::post('/metbuat/{id}','Admin\CorporateController@adminpressupdate')->name('adminpressupdate') ;
        Route::delete('/metbuat-sil/{id}','Admin\CorporateController@pressdelete')->name('pressdelete');
        Route::get('/metbuat-ana-sehifede/{id}','Admin\CorporateController@pressactiveathome')->name('pressactiveathome');

        Route::get('/blog-kategoriyası','Admin\OtherController@blog_categories')->name('blog_categories');
        Route::post('/blog-kategoriyası','Admin\OtherController@blog_category_store') ;
        Route::post('/blog-kategoriyası/{id}','Admin\OtherController@blog_category_update')->name('blog_category_update') ;
        Route::delete('/blog-kategoriyası-sil/{id}','Admin\OtherController@blog_category_delete')->name('blogcatdelete');

        Route::get('/blog-yazıları','Admin\OtherController@blogs')->name('adminblogs');
        Route::get('/yeni-blog','Admin\OtherController@blogcreate')->name('blogcreate');
        Route::post('/yeni-blog','Admin\OtherController@blogstore');
        Route::get('/blog-redaktəsi/{id}','Admin\OtherController@blogedit')->name('blogupdate');
        Route::post('/blog-redaktəsi/{id}','Admin\OtherController@blogupdate');
        Route::delete('/blog-sil/{id}','Admin\OtherController@blogdelete')->name('blogdelete');

        Route::get('/sss','Admin\OtherController@faq')->name('adminfaq');
        Route::post('/sss','Admin\OtherController@faqstore') ;
        Route::post('/sss/{id}','Admin\OtherController@faqupdate')->name('faqupdate') ;
        Route::delete('/sss-sil/{id}','Admin\OtherController@faqdelete')->name('faqdelete');

    });
    //endprefix

    });
//end middleware

    Route::group(['prefix'=>'istifadeci'],function (){
        Route::get('/giris','Site\CustomerAuthController@login')->name('customer.login');
        Route::post('/giris','Site\CustomerAuthController@logincontrol');

        Route::group(['middleware'=>'customerauth' ],function (){

            Route::post('/customeredit','Site\CustomerAuthController@accountupdate')->name('accountupdate');
            Route::post('/passwordupdate','Site\CustomerAuthController@passwordupdate')->name('passwordupdate');
        });


    });







if (adjustment()->multilang == 1){

        Route::group(
            [
               'prefix' => LaravelLocalization::setLocale(),
               'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]  ], function(){ //...

               Route::get('/','Site\GeneralController@index')->name('site.index');
               Route::get('/elaqe','Site\GeneralController@contact')->name('site.contact');
               Route::get('/sehife-{slug}','Site\GeneralController@serviceDetail')->name('page');

               Route::get('/butun-kategoriyalar/{id?}{slug?}','Site\ProductsController@allcategories')->name('site.allcategories');
               Route::get('/mehsullar','Site\ProductsController@products')->name('site.products');
               Route::get('/mehsullar/{id}-{slug}','Site\ProductsController@productcategory')->name('site.productcategory');
               Route::get('/mehsul/{id}-{slug}','Site\ProductsController@productDetail')->name('site.productDetail');
               Route::get('/mehsul-axtarisi/{axtaris?}','Site\ProductsController@productsearch')->name('site.productsearch');
               Route::get('/mehsul-json/{id?}','Site\ProductsController@productjson')->name('site.productjson');



               Route::get('/kurslar-ve-xidmetler','Site\GeneralController@services')->name('site.services');
               Route::get('/istifadeci-qeydiyyati','Site\CustomerAuthController@register')->name('customer.register');
               Route::post('/istifadeci-qeydiyyati','Site\CustomerAuthController@registerstore') ;


            Route::group(['middleware'=>'customerauth','prefix'=>'istifadeci'],function (){

                Route::post('/cixisih-et','Site\CustomerAuthController@logout')->name('customer.logout');
                Route::get('/', function (){
                    return redirect()->route('customer.profil');
                });

                Route::get('/profil','Site\CustomerController@profil')->name('customer.profil');
                Route::get('/favorilerim','Site\CustomerController@wishlist')->name('customer.wishlist');
                Route::get('/favorilerime-elave-et','Site\CustomerController@addtowishlist')->name('customer.addtowishlist');
                Route::get('/sebete-elave-et','Site\CustomerController@addtocart')->name('customer.addtocart');

            });




//               Route::get('/hakkimizda','Site\GeneralController@about')->name('site.about');
//               Route::get('/metbuatda','Site\GeneralController@press')->name('site.press');
//               Route::get('/sual-cavab','Site\GeneralController@faq')->name('site.faq');
//               Route::get('/qaleriya','Site\GeneralController@gallery')->name('site.gallery');
//               Route::get('/xeberler','Site\GeneralController@blogs')->name('site.blogs');
//               Route::get('/xeberler/{id}{slug}','Site\GeneralController@blogcat')->name('site.blogcat');
//               Route::get('/blog/{id}/{slug}','Site\GeneralController@blogdetail')->name('site.blogdetail');
        });
    }
    else{
//        Route::get('/','Site\GeneralController@index')->name('site.index');
//        Route::get('/hakkimizda','Site\GeneralController@about')->name('site.about');
//        Route::get('/metbuatda','Site\GeneralController@press')->name('site.press');
//        Route::get('/sual-cavab','Site\GeneralController@faq')->name('site.faq');
//        Route::get('/kurslar-ve-xidmetler','Site\GeneralController@services')->name('site.services');
//        Route::get('/kurslar-ve-xidmetler/{id}/{slug}','Site\GeneralController@serviceDetail')->name('site.serviceDetail');
//        Route::get('/elaqe','Site\GeneralController@contact')->name('site.contact');
//        Route::get('/qaleriya','Site\GeneralController@gallery')->name('site.gallery');
//        Route::get('/bloglar','Site\GeneralController@blogs')->name('site.blogs');
//        Route::get('/bloglar/{id}{slug}','Site\GeneralController@blogcat')->name('site.blogcat');
//        Route::get('/blog/{id}/{slug}','Site\GeneralController@blogdetail')->name('site.blogdetail');
    }

    Route::post('/mesaj-gonder','Site\GeneralController@sendmessage')->name('sendmessage');



Route::get('/file-test-etmek',function (){
    $domain = 'https://protool.az/' ;
    $a =  file_get_contents($domain) ;
    var_dump($a) ;

    echo $domain ;
    echo $a ;

}) ;


Route::get('/clear',function (){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

}) ;
