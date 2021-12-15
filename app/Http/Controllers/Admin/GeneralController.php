<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\CarouselContent;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function index()
    {
        $currencies = (new ApiController)->getCurrencies();
        $carousels = Carousel::all();
        $blogs = Blog::latest()->take(2,1)->get();
        $services = Service::all();
        return view('Admin.pages.dashboard',compact(['currencies','blogs','services','carousels']));
    }

    ################################################################
    #        SETTING SECTION
    ################################################################
        public function sitesetting(){
         $setting = DB::table('sitesetting')->first();
         if ($setting == null){
             return view( 'Admin.pages.setting');
         }else{
             return view('Admin.pages.settingedit',compact(['setting']));
         }
        }//end sitesetting

        public function sitesettingstore(Request $request){

        if (Setting::first() == null)
        {
            return back();
        }

            try {
                $logoname = null;
                $footer_logoname = null;
                $faviconname = null;

                $logo = $request->file('logo');
                $footer_logo = $request->file('footer_logo');
                $favicon = $request->file('favicon');


                if ($logo) {
                    $request->validate([
                        'logo' => 'required',
                    ]);
                    $path = "/photos/site";
                    $imagepath = public_path() . $path;
                    if ($logo->isValid()) {
                        $newimagename = rand(1, 100) . time() . '.' . $logo->getClientOriginalExtension();
                        $imageurl = $path . '/' . $newimagename; //for DB
                        $logo->move($imagepath, $newimagename);
                        $logoname = $imageurl;
                    }
                }

                if ($footer_logo) {
                    $request->validate([
                        'footer_logo' => 'required',
                    ]);
                    $path = "/photos/site";
                    $imagepath = public_path() . $path;
                    if ($footer_logo->isValid()) {
                        $newimagename = rand(1, 100) . time() . '.' . $footer_logo->getClientOriginalExtension();
                        $imageurl = $path . '/' . $newimagename; //for DB
                        $footer_logo->move($imagepath, $newimagename);
                        $footer_logoname = $imageurl;
                    }
                }

                if ($favicon) {
                    $request->validate([
                        'favicon' => 'required',
                    ]);
                    $path = "/photos/site";
                    $imagepath = public_path() . $path;
                    if ($favicon->isValid()) {
                        $newimagename = rand(1, 100) . time() . '.' . $favicon->getClientOriginalExtension();
                        $imageurl = $path . '/' . $newimagename; //for DB
                        $favicon->move($imagepath, $newimagename);
                        $faviconname = $imageurl;
                    }
                }


                $data = ['logo' => $logoname,
                    'footer_logo' => $footer_logoname,
                    'favicon' => $faviconname,
                    'site_url' => $request->site_url,
                    'title' => $request->title,
                    'meta_content' => $request->meta_content,
                    'meta_keywords' => $request->meta_keywords,
                    'any_meta_tags' => $request->any_meta_tags,
                    'g_analytcs_script' => $request->g_analytcs_script,
                    'whatsapp_script' => $request->whatsapp_script,
                    'chat_script' => $request->chat_script
                ];

                DB::table('sitesetting')->insert($data);

                $feedbackdata = ['title' => 'Başarılı !',
                    'text' => 'Sayt məlumatları uğurla qeyd edildi',
                    'icon' => 'success',
                    'button' => 'Bağla',];
                return back()->with('feedback', $feedbackdata);
            }
            catch (\Exception $e){

                $feedbackdata = ['title' => 'Başarısız !',
                    'text' => 'Sayt məlumatları yaddaşa yazılarkən xəta baş verdi. Xəta: '.$e->getMessage(),
                    'icon' => 'warning',
                    'button' => 'Bağla',];
                return back()->with('feedback', $feedbackdata);
              }


    }

        public function sitesettingupdate(Request $request){

            try {
            $setting = Setting::first();
            $logo = $request->file('logo');
            $footer_logo = $request->file('footer_logo');
            $favicon = $request->file('favicon');


            if ($logo){
                $request->validate([
                    'logo' => 'required',
                ]);
                $path = "/photos/site";
                $imagepath = public_path() . $path;
                if ($logo->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $logo->getClientOriginalExtension();
                    $imageurl = $path . '/' . $newimagename; //for DB
                    $logo->move($imagepath, $newimagename);
                    $setting->logo = $imageurl;
                }
            }

            if ($footer_logo){
                $request->validate([
                    'footer_logo' => 'required',
                ]);
                $path = "/photos/site";
                $imagepath = public_path() . $path;
                if ($footer_logo->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $footer_logo->getClientOriginalExtension();
                    $imageurl = $path . '/' . $newimagename; //for DB
                    $footer_logo->move($imagepath, $newimagename);
                    $setting->footer_logo  = $imageurl;
                }
            }

            if ($favicon){
                $request->validate([
                    'favicon' => 'required',
                ]);
                $path = "/photos/site";
                $imagepath = public_path() . $path;
                if ($favicon->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $favicon->getClientOriginalExtension();
                    $imageurl = $path . '/' . $newimagename; //for DB
                    $favicon->move($imagepath, $newimagename);
                    $setting->favicon  = $imageurl;
                }
            }

            $setting->site_url = $request->site_url;
            $setting->title = $request->title;
            $setting->meta_content = $request->meta_content;
            $setting->meta_keywords = $request->meta_keywords;
            $setting->any_meta_tags = $request->any_meta_tags;
            $setting->g_analytcs_script = $request->g_analytcs_script;
            $setting->whatsapp_script = $request->whatsapp_script;
            $setting->chat_script = $request->chat_script;

             $setting->save();
             $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Sayt məlumatları uğurla redaktə edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
            }
            catch ( Exception $e){
                $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Sayt məlumatları yenilənərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
            }
    }

    ################################################################
    #        END  SETTING SECTION
    ################################################################

    ################################################################
    #          CONTACT SECTION
    ################################################################

    public function contact(){
        $contact = Contact::first();
        if ($contact != null){
            return view('Admin.pages.contactedit',compact(['contact']));
        }else{

            return view('Admin.pages.contact');
        }
    }

    public function contacttore(Request $request)
    {
        if (Contact::first() !=null){
            return back();
        }
        try{
        $contact = new Contact();
        $contact->number = $request->number;
        $contact->phone = $request->phone;
        $contact->fax = $request->fax;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->googlemap = $request->googlemap;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->youtube = $request->youtube;
        $contact->linkedin = $request->linkedin;
        $contact->workinghourstart = $request->workinghourstart;
        $contact->workinghourend = $request->workinghourend;
        $contact->save();

            $feedbackdata = ['title' => 'Başarılı!',
                'text' => 'Əlaqə məlumatları uğurla yaddaşa yaıldı',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }
        catch (\Exception $e){

                $feedbackdata = ['title' => 'Başarısız !',
                    'text' => 'Əlaqə məlumatları yaddaşa yazılarkən xəta baş verdi. Xəta: '.$e->getMessage(),
                    'icon' => 'warning',
                    'button' => 'Bağla',];
                return back()->with('feedback', $feedbackdata);
            }
    }

    public function contactupdate(Request $request){
        try{
            $contact = Contact::first();
            $contact->number = $request->number;
            $contact->phone = $request->phone;
            $contact->fax = $request->fax;
            $contact->email = $request->email;
            $contact->address = $request->address;
            $contact->googlemap = $request->googlemap;
            $contact->facebook = $request->facebook;
            $contact->instagram = $request->instagram;
            $contact->youtube = $request->youtube;
            $contact->linkedin = $request->linkedin;
            $contact->workinghourstart = $request->workinghourstart;
            $contact->workinghourend = $request->workinghourend;
            $contact->save();

            $feedbackdata = ['title' => 'Başarılı!',
                'text' => 'Əlaqə məlumatları uğurla redaktə edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }
        catch (\Exception $e){
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Əlaqə məlumatları redaktə edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }
    }


    ################################################################
    #        END CONTACT SECTION
    ################################################################

################################################################
#        SLİDER SECTION
################################################################

public function carousels(){
    $carousels = Carousel::all();
    return view('Admin.pages.carousel',compact(['carousels']));
}

public function newcarousel(){

    return view('Admin.pages.carouselnew');
}

public function carouselstore(Request $request){
    $image = $request->file('image');

    DB::beginTransaction();
    try {
        $carousel = new Carousel();
        #image upload
        if ($image){
            $path = "/photos/carousel";
            $imagepath = public_path() . $path;
            if ($image->isValid()){
                $newimagename = rand(1, 100).time().'.'.$image->getClientOriginalExtension();
                $location = $imagepath . '/' . $newimagename;
                $imageurl = $path . '/' . $newimagename; //for DB
                makedirectory($path);
              $response = compressImage(['source' => $image, 'destination' => $location]);
              if ($response != true){
                    $image->move($imagepath, $newimagename);
                }
            }

            $carousel->image = $imageurl;
        }
        $carousel->desk = $request->desk;

        $carousel->save();

        $datacontent = [];
        foreach (languages() as $lang) {
            $lang = $lang->code;

            $title = request('title_' . $lang);
            $header = request('header_' . $lang);
            $content = request('content_' . $lang);
            $url= request('url_' . $lang);

            if ($lang != null ) {
                $data = [
                    'carousel_id' => $carousel->id,
                    'lang' => $lang,
                    'title' => $title,
                    'header' => $header,
                    'content' => $content,
                    'url' => $url
                ];
                array_push($datacontent, $data);
            }
        }

        DB::table('carousel_content')->insert($datacontent);

    } catch (\Exception $exception) {
        DB::rollBack();
        $feedbackdata = ['title' => 'Başarısız !',
            'text' => 'Manşet məlumatları yaddaşa yazılarkən xəta baş verdi xahiş edirik yeniden yoxlayın. ERROR : '.$exception->getMessage(),
            'icon' => 'warning',
            'button' => 'Bağla',];

        return back()->with('feedback', $feedbackdata);
    }
    DB::commit();
    $feedbackdata = ['title' => 'Başarılı !',
        'text' => 'Manşet məlumatları yaddaşa yazıldı',
        'icon' => 'success',
        'button' => 'Bağla',];
    return back()->with('feedback', $feedbackdata);

} //end servicestore

public function carouseledit($id){
    $carousel = Carousel::find($id);
    return view('Admin.pages.carouseledit',compact(['carousel']));
}//end serviceedit

public function carouselupdate($id, Request $request)
{

# step 1_________________________;
    try {

        $image = $request->file('image');

         $carousel = Carousel::find($id);

        if ($image) {
            $path = "/photos/carousel";
            $imagepath = public_path() . $path;
           $validateimage = $image->isValid();


            if ($validateimage){
                $newimagename = rand(1, 100).time().'.'.$image->getClientOriginalExtension();

                $location = $imagepath . '/' . $newimagename;
                $imageurl = $path . '/' . $newimagename; //for DB
                makedirectory($path);
               deleteimage(public_path($carousel->image));
              $response =  compressImage(['source' => $image, 'destination' => $location]);

                if ($response != false){
                    $image->move($imagepath, $newimagename);

                }

            }
            $carousel->image = $imageurl;

        }
        $carousel->desk = $request->desk;
        $carousel->save();

# end step 1_________________________;
        $carousel_content = DB::table('carousel_content')->where('carousel_id', $id)->get();
        $datacontent = [];

        if ($carousel_content->isEmpty()) {
            foreach (languages() as $lang) {
                $lang = $lang->code;
                $title = request('title_'.$lang);
                $header = request('header_'.$lang);
                $content = request('content_'.$lang);
                $url = request('url_' . $lang);

                if ($lang != null) {
                    $data = [
                        'carousel_id' => $carousel->id,
                        'lang' => $lang,
                        'title' => $title,
                        'header' => $header,
                        'content' => $content,
                        'url' => $url,
                    ];
                    array_push($datacontent, $data);
                }
            }

        }

        else {

            foreach (languages() as $lang) {
                $thisrow = DB::table('carousel_content')->where('carousel_id', $id)->where('lang',$lang->code)->first();


                if ( $thisrow != NULL) {

                    $title = request('title_' . $lang->code);
                    $header = request('header_'.$lang->code);
                    $content = request('content_' . $lang->code);
                    $url = request('url_' . $lang->code);

                    if ($title != null) {
                        $data = [
                            'carousel_id' => $carousel->id,
                            'lang' => $lang->code,
                            'title' => $title,
                            'header' => $header,
                            'content' => $content,
                            'url' => $url
                        ];
                        DB::table('carousel_content')->where('id',$thisrow->id)->update($data);
                    }//end if null

                }

                else {//endif language code
                    $title = request('title_' . $lang->code);
                    $content = request('content_' . $lang->code);
                    $header = request('header_'.$lang->code);
                    $url = request('url_' . $lang->code);

                    if ($title != null) {
                        $data = [
                            'carousel_id' => $carousel->id,
                            'lang' => $lang->code,
                            'title' => $title,
                            'header' => $header,
                            'content' => $content,
                            'url' => $url
                        ];
                        array_push($datacontent, $data);
                    }
                }//else



            }

        }//else
        DB::table('carousel_content')->insert($datacontent);

        $feedbackdata = ['title' => 'Başarılı !',
            'text' => 'Manşet məlumatları uğurla redaktə edildi',
            'icon' => 'success',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);

    }catch (\Exception $e){

        $feedbackdata = ['title' => 'Başarısız !',
            'text' => 'Manşet məlumatları redaktə edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
            'icon' => 'warning',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);

    }//end cache

}//end serviceupdate

public function carouseldelete($id){

    DB::beginTransaction();
    try {
        $carousel = Carousel::find($id) ;
        deleteimage(public_path($carousel->image));
        $carousel->delete();
        CarouselContent::where('carousel_id',$id)->delete();
        DB::commit();

        $feedbackdata = ['title' => 'Başarılı !',
            'text' => 'Manşet uğurla silindi',
            'icon' => 'success',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);

    }catch (\Exception $e){
        DB::rollBack();

        $feedbackdata = ['title' => 'Başarısız !',
            'text' => 'Manşet məlumatları silinərkən xəta baş verdi. Xəta: '.$e->getMessage(),
            'icon' => 'warning',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);
    }

}

public function carouselactive($id){

        try {

            $service = Carousel::find($id);
            $service->active = 1;
            $service->save();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Manşet uğurla aktif edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Manşet aktif edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }

public function carouseldeactive($id){
        try {

            $service = Carousel::find($id);
            $service->active = 0;
            $service->save();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Manşet uğurla Pasif edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Manşet pasif edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }

################################################################
#        END  SLİDER SECTION
################################################################



################################################################
#        CAROUSEL SECTION
################################################################

    public function gallery(){
      return view('Admin.pages.gallery');
    }

    public function gallerystore(Request $request){

        $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);

        $image =  request()->file('file');
        if($image->isValid()){
            $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();
            $path = "/photos/gallery";
            $imagepath = public_path() . $path;
            $location = $imagepath . '/' . $newimagename;
            $imageurl = $path . '/' . $newimagename; //for DB
            makedirectory($path);
            $response = compressImage(['source' => $image, 'destination' => $location]);

            if ($response != true){
                $image->move($imagepath, $newimagename);
            }
            $img = Gallery::create([
                'image'=>$imageurl
            ]);

        }
    }

    function galleryfetch()
    {
        $images = Gallery::all();
        $output = '<div class="row">';
        foreach($images as $image)
        {
            $output = '<div class="card-columns flex-row">';
            foreach($images as $image)
            {

                $output .= '<div class="card d-inline-flex">
                            <img class="card-img-top img-fluid" src="'. $image->image .'"
                                 alt="Card image cap">
                                  <button type="button" class="btn remove_image" data-id="'.$image->id.'">Sil</button>
                         </div>';
            }



        }
        $output .= '</div>';
        echo $output;
    }

    function gallerydelete(Request $request)
    {
        if( $request->get('id'))
        {
            $image = Gallery::find($request->get('id'));
            deleteimage(public_path($image->image) );
            $deleted = $image->delete();
        }
    }
################################################################
#        END  CAROUSEL SECTION
################################################################

}

