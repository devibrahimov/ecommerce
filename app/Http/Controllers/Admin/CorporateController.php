<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Press;
use App\Models\Service;
use App\Models\ServiceContent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CorporateController extends Controller
{

    ################################################################
    #           ABOUT US SECTION
    ################################################################
    public function aboutus()
    {
        $about = About::first();
        if ($about == NULL) {
            return view('Admin.pages.aboutus', compact('about'));
        } else {
            $about = About::first();
            $aboutcontent = DB::table('aboutus_content')->where('about_id', $about->id)->get();

            return view('Admin.pages.aboutusedit', compact('about', 'aboutcontent'));
        }
    }

    public function aboutusstore(Request $request)
    {

        $movie = $request->videoiframe;
        $image = $request->file('image');


        DB::beginTransaction();
        try {
            $about = new About();

            #image upload
            if ($image) {
                $path = "/photos";
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

                $about->image = $imageurl;

            }

            $about->save();

            $datacontent = [];

            foreach (languages() as $lang) {
                $lang = $lang->code;

                $header = request('header_' . $lang);
                $homecontent = request('homecontent_' . $lang);
                $content = request('content_' . $lang);
                $metacontent = request('metacontent_' . $lang);
                $metakeywords = request('metakeywords_' . $lang);

                if ($header != null) {
                    $data = [
                        'about_id' => $about->id,
                        'lang' => $lang,
                        'header' => $header,
                        'home_content' => $homecontent,
                        'content' => $content,
                        'meta_content' => $metacontent,
                        'meta_keywords' => $metakeywords
                    ];
                    array_push($datacontent, $data);
                }
            }

            DB::table('aboutus_content')->insert($datacontent);

        } catch (\Exception $exception) {
            DB::rollBack();
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Hakkımızda məlumatları yaddaşa yazılarkən xəta baş verdi xahiş edirik yeniden yoxlayın',
                'icon' => 'warning',
                'button' => 'Bağla' ];
            return back()->with('feedback', $feedbackdata);
        }

        DB::commit();
        $feedbackdata = ['title' => 'Başarılı !',
            'text' => 'Hakkımızda məlumatları yaddaşa yazıldı',
            'icon' => 'success',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);

    }//end aboutusstore

    public function aboutusupdate($id, Request $request)
    {

        # step 1_________________________;
        try {


            $image = $request->file('image');
            $about = About::first();
            if ($image) {
                $path = "/photos";
                $imagepath = public_path() . $path;
                if ($image->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();

                    $location = $imagepath . '/' . $newimagename;
                    $imageurl = $path . '/' . $newimagename; //for DB
                    makedirectory($path);
                    deleteimage(public_path($about->image));
                    $response =compressImage(['source' => $image, 'destination' => $location]);
                    if ($response != true){
                        $image->move($imagepath, $newimagename);
                    }
                }
                $about->image = $imageurl;
            }

            $about->save();
            # end step 1_________________________;
            $aboutus_content = DB::table('aboutus_content')->where('about_id', $id)->get();
            $datacontent = [];

            if ($aboutus_content->isEmpty()) {
                foreach (languages() as $lang) {
                    $lang = $lang->code;
                    $header = request('header_' . $lang);
                    $homecontent = request('homecontent_' . $lang);
                    $content = request('content_' . $lang);
                    $metacontent = request('metacontent_' . $lang);
                    $metakeywords = request('metakeywords_' . $lang);

                    if ($header != null) {
                        $data = [
                            'about_id' => $about->id,
                            'lang' => $lang,
                            'header' => $header,
                            'home_content' => $homecontent,
                            'content' => $content,
                            'meta_content' => $metacontent,
                            'meta_keywords' => $metakeywords
                        ];
                        array_push($datacontent, $data);
                    }
                }

            }

            else {

                foreach (languages() as $lang) {
                    $thisrow = DB::table('aboutus_content')->where('about_id', $id)->where('lang',$lang->code)->first();

                    if ( $thisrow != NULL) {
                        $header = request('header_' . $lang->code);
                        $homecontent = request('homecontent_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($header != null) {
                            $data = [
                                'about_id' => $about->id,
                                'lang' => $lang->code,
                                'header' => $header,
                                'home_content' => $homecontent,
                                'content' => $content,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            DB::table('aboutus_content')->where('id',$thisrow->id)->update($data);
                        }//end if null

                    }

                    else {//endif language code
                        $header = request('header_' . $lang->code);
                        $home_content = request('homecontent_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($header != null) {
                            $data = [
                                'about_id' => $about->id,
                                'lang' => $lang->code,
                                'header' => $header,
                                'content' => $content,
                                'home_content'=>$home_content,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            array_push($datacontent, $data);
                        }
                    }//else
                }
            }//else

            DB::table('aboutus_content')->insert($datacontent);
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Hakkımızda məlumatları uğurla Yeniləndi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Hakkımızda məlumatları yaddaşa yazılarkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }//end cache

    }//end adminaboutusupdate

    ################################################################
    #        END  ABOUT US SECTION
    ################################################################

    ################################################################
    #        SERVICES SECTION
    ################################################################

    public function services(){
        $services = Service::all();
        return view('Admin.pages.services',compact(['services']));
    }

    public function newservice(){

        return view('Admin.pages.newservice');
    }

    public function servicestore(Request $request){
        $image = $request->file('image');
        $icon = $request->file('icon');


        DB::beginTransaction();
        try {
            $service = new Service();

            #image upload
            if ($image) {
                $path = "/photos/services";
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

                $service->image = $imageurl;

            }

            if ($icon) {

                $request->validate([
                    'icon' => 'required|mimes:png',
                ]);
                $path = "/photos/services";
                $iconpath = public_path() . $path;
                if ($icon->isValid()) {
                    $newiconname = rand(1, 100) . time() . '.' . $icon->getClientOriginalExtension();

                    $location = $iconpath . '/' . $newiconname;
                    $iconurl = $path . '/' . $newiconname; //for DB
                    $icon->move($iconpath, $newiconname);

                    $service->icon = $iconurl;
                }
            }
            $service->desk = $request->desk;
            $service->save();

            $datacontent = [];
            foreach (languages() as $lang) {
                $lang = $lang->code;

                $name = request('name_' . $lang);
                $content = request('content_' . $lang);
                $metacontent = request('metacontent_' . $lang);
                $metakeywords = request('metakeywords_' . $lang);

                if ($lang != null and $name != null) {
                    $data = [
                        'service_id' => $service->id,
                        'lang' => $lang,
                        'name' => $name,
                        'slug' => Str::slug($name),
                        'content' => $content,
                        'meta_content' => $metacontent,
                        'meta_keywords' => $metakeywords
                    ];
                    array_push($datacontent, $data);
                }
            }

            DB::table('services_content')->insert($datacontent);

        } catch (\Exception $exception) {
            DB::rollBack();
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Xidmət məlumatları yaddaşa yazılarkən xəta baş verdi xahiş edirik yeniden yoxlayın. ERROR : '.$exception->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];

            return back()->with('feedback', $feedbackdata);
        }
        DB::commit();
        $feedbackdata = ['title' => 'Başarılı !',
            'text' => 'Xidmət məlumatları yaddaşa yazıldı',
            'icon' => 'success',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);

    } //end servicestore

    public function serviceedit($id){
        $service = Service::find($id);
        return view('Admin.pages.editservice',compact(['service']));
    }//end serviceedit

    public function serviceupdate($id, Request $request)
    {


# step 1_________________________;
        try {

            $image = $request->file('image');
            $icon = $request->file('icon');

            $service = Service::find($id);

            if ($image) {
                $path = "/photos/services";
                $imagepath = public_path() . $path;
                if ($image->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();

                    $location = $imagepath . '/' . $newimagename;
                    $imageurl = $path . '/' . $newimagename; //for DB
                    makedirectory($path);
                    deleteimage(public_path($service->image));
                    $response =   compressImage(['source' => $image, 'destination' => $location]);
                    if ($response != true){
                        $image->move($imagepath, $newimagename);
                    }
                }

                $service->image = $imageurl;

            }
            if ($icon) {
                $request->validate([
                    'icon' => 'required|mimes:png',
                ]);
                $path = "/photos/services";
                $iconpath = public_path() . $path;
                if ($icon->isValid()) {
                    $newiconname = rand(1, 100) . time() . '.' . $icon->getClientOriginalExtension();

                    $location = $iconpath . '/' . $newiconname;
                    $iconurl = $path . '/' . $newiconname; //for DB
                    $icon->move($iconpath, $newiconname);
//                        makedirectory($path);
//                        compressImage(['source' => $icon, 'destination' => $location]);


                    $service->icon = $iconurl;
                }
            }
            $service->desk = $request->desk;
            $service->save();
# end step 1_________________________;
            $service_content = DB::table('services_content')->where('service_id', $id)->get();
            $datacontent = [];

            if ($service_content->isEmpty()) {
                foreach (languages() as $lang) {
                    $lang = $lang->code;
                    $name = request('name_' . $lang);
                    $content = request('content_' . $lang);
                    $metacontent = request('metacontent_' . $lang);
                    $metakeywords = request('metakeywords_' . $lang);

                    if ($name != null) {
                        $data = [
                            'service_id' => $service->id,
                            'lang' => $lang,
                            'name' => $name,
                            'slug' => Str::slug($name),
                            'content' => $content,
                            'meta_content' => $metacontent,
                            'meta_keywords' => $metakeywords
                        ];
                        array_push($datacontent, $data);
                    }
                }

            }

            else {

                foreach (languages() as $lang) {
                    $thisrow = DB::table('services_content')->where('service_id', $id)->where('lang',$lang->code)->first();


                    if ( $thisrow != NULL) {
                        $name = request('name_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'service_id' => $service->id,
                                'lang' => $lang->code,
                                'name' => $name,
                                'slug' => Str::slug($name),
                                'content' => $content,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            DB::table('services_content')->where('id',$thisrow->id)->update($data);
                        }//end if null
                    }

                    else {//endif language code
                        $name = request('name_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'service_id' => $service->id,
                                'lang' => $lang->code,
                                'name' => $name,
                                'slug' => Str::slug($name),
                                'content' => $content,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            array_push($datacontent, $data);
                        }
                    }//else
                }

            }//else
            DB::table('services_content')->insert($datacontent);

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Xidmət məlumatları uğurla redaktə edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Xidmət məlumatları redaktə edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }//end cache

    }//end serviceupdate

    public function servicedelete($id){

        DB::beginTransaction();
        try {

            $service = Service::find($id);
            deleteimage(public_path($service->image));
            $service->delete();
            ServiceContent::where('service_id',$id)->delete();
            DB::commit();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Xidmət uğurla silindi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){
            DB::rollBack();

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Xidmət məlumatları silinərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }

    public function serviceactive($id){

        try {

            $service = Service::find($id);
            $service->active = 1;
            $service->save();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Xidmət uğurla aktif edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Xidmət aktif edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }

    public function servicedeactive($id){
        try {

            $service = Service::find($id);
            $service->active = 0;
            $service->save();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Xidmət uğurla Pasif edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Xidmət pasif edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }


    ################################################################
    #        END  SERVICE SECTION
    ################################################################



    ################################################################
    #        PRESS  SECTION
    ################################################################
    public function adminpress(){
        $items = Press::all();
        $categories = DB::table('presscategories') ->where('lang',defaultLang())->get();
        return view('Admin.pages.presspage',compact(['items','categories']));
    }

    public function adminpressstore(Request $request){
        try {
            $press = new Press();

            $press->title =   $request->title ;
            $press->category =   $request->category;
            $press->content =  $request->contentdata;
            $press->url =   $request->url  ;
            $press->movie =   $request->movie  ;
            $image = $request->file('image');
            if ($image) {
                $path = "/photos/press";
                $imagepath = public_path() . $path;
                if ($image->isValid()){
                    $newimagename = rand(1, 100).time().'.'.$image->getClientOriginalExtension();
                    $location = $imagepath . '/' . $newimagename;
                    $imageurl = $path . '/' . $newimagename; //for DB
                    makedirectory($path);

                    $response =  compressImage(['source' => $image, 'destination' => $location]);
                    if ($response != true){
                        $image->move($imagepath, $newimagename);
                    }
                }

                $press->image = $imageurl;
            }

            $press->save();
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Mətbuatkı xəbər uğurla əlavə edildi! ' ,
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }catch (\Exception $e){
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Əməliyyat zamanı xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }
    }

    public function adminpressupdate($id,Request $request){
        try {
            $press =   Press::find($id);
            $press->title =   $request->title ;
            $press->category =   $request->category ;
            $press->content =   $request->contentdata ;
            $press->url =   $request->url ;
            $press->movie =   $request->movie ;

            if (  $request->image != NULL )
            {
                $image = $request->image;
                $path = "/photos/press";
                $imagepath = public_path() . $path;
                if ($image->isValid()){
                    $newimagename = rand(1, 100).time().'.'.$image->getClientOriginalExtension();
                    $location = $imagepath . '/' . $newimagename;
                    $imageurl = $path . '/' . $newimagename; //for DB
                    makedirectory($path);
                    deleteimage(public_path($press->image));
                    $response =  compressImage(['source' => $image, 'destination' => $location]);
                    if ($response != true){
                        $image->move($imagepath, $newimagename);
                    }
                }
                $press->image = $imageurl;
            }
            $press->save();
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'xəbər yazısı uğurla yeniləndi! ' ,
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }catch (\Exception $e){
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'xəbər yazısı yenilənərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }
    }

    public function pressdelete($id,Request $request){
        try {
            $press = Press::find($id);
            deleteimage(public_path($press->image) );
            $press->delete();
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'xəbər yazısı uğurla silindi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }catch (\Exception $e){
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'İsdifadəçi silinərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }
    }
    public function pressactiveathome($id){
        try{
        DB::table('press')->where('athome',1)->update(['athome'=>0]);
        DB::table('press')->where('id',$id)->update(['athome'=>1]);
        $feedbackdata = ['title' => 'Başarılı !',
            'text' => 'xəbər yazısı uğurla ana sehifede gösterildi! ' ,
            'icon' => 'success',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);
            }catch (\Exception $e){
        $feedbackdata = ['title' => 'Başarısız !',
        'text' => ' xəbər yazısı ana sehifeye teyin edilerken xəta baş verdi. Xəta: '.$e->getMessage(),
        'icon' => 'warning',
        'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);
        }
    }

    ################################################################
    #        END PRESS  SECTION
    ################################################################
}
