<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogCategoryContent;
use App\Models\BlogContent;
use App\Models\FAQ;
use App\Models\FaqContent;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OtherController extends Controller
{
    ################################################################
    #        BLOG Category  SECTION
    ################################################################
    public function blog_categories(){
        $items = BlogCategory::all();
        return view('Admin.pages.blog_categories',compact(['items']));
    }

    public function blog_category_store(Request $request){
        try {
            $blogcat = new BlogCategory();

            $blogcat->show = 0 ;
            $blogcat->save() ;


            $datacontent = [];
            foreach (languages() as $lang) {
                $lang = $lang->code;

                $name= request('name_' . $lang);

                if ($lang != null and $name!= null) {
                    $data = [
                        'base_id' => $blogcat->id,
                        'lang' => $lang,
                        'name' => $name,

                    ];
                    array_push($datacontent, $data);
                }
            }

            DB::table('blogcategory_contents')->insert($datacontent);
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Blog Kategoriyası yaddaşa yazıldı',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }catch (\Exception $e){
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => ' Blog Kategoriyası əlavə edilərkən xəta baş verdi . XƏTA : '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];

            return back()->with('feedback', $feedbackdata);
        }
    }

    public function blog_category_update($id,Request $request){

    # step 1_________________________;
        try {

            $BlogCategory = BlogCategory::find($id);

# end step 1_________________________;
            $blogcategory_content = DB::table('blogcategory_contents')->where('base_id', $id)->get();
            $datacontent = [];

            if ($blogcategory_content->isEmpty()) {
                foreach (languages() as $lang) {
                    $lang = $lang->code;
                    $name = request('name_' . $lang);
                    if ($name != null) {
                        $data = [
                            'base_id' => $BlogCategory->id,
                            'lang' => $lang,
                            'name' => $name,
                        ];
                        array_push($datacontent, $data);
                    }
                }

            }

            else {

                foreach (languages() as $lang) {
                    $thisrow = DB::table('blogcategory_contents')->where('base_id', $id)->where('lang',$lang->code)->first();

                    if ( $thisrow != NULL) {
                        $name = request('name_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'base_id' => $BlogCategory->id,
                                'lang' => $lang->code,
                                'name' => $name,
                            ];
                            DB::table('blogcategory_contents')->where('id',$thisrow->id)->update($data);
                        }//end if null

                    }

                    else {//endif language code
                        $name = request('name_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'base_id' => $BlogCategory->id,
                                'lang' => $lang->code,
                                'name' => $name,

                            ];
                            array_push($datacontent, $data);
                        }
                    }//else



                }

            }//else
            DB::table('blogcategory_contents')->insert($datacontent);

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Blog Kategorisi uğurla redaktə edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Blog Kategorisi redaktə edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }//end cache

    }

    public function blog_category_delete($id){

        DB::beginTransaction();
        try {

            $BlogCategory = BlogCategory::find($id);

            $BlogCategory->delete();
            BlogCategoryContent::where('base_id',$id)->delete();
            DB::commit();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Blog Kategorisi uğurla silindi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){
            DB::rollBack();

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Blog Kategorisi silinərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }
    ################################################################
    #        End BLOG Category  SECTION
    ################################################################


    ################################################################
    #        BLOG SECTION
    ################################################################

    public function blogs(){
        $blogs = Blog::all();
        return view('Admin.pages.blogs',compact(['blogs']));
    }

    public function blogcreate(){
        $categories = BlogCategory::all();
        return view('Admin.pages.blogcreate',compact(['categories']));
    }

    public function blogstore(Request $request){
        $image = $request->file('image');

        DB::beginTransaction();
        try {
            $blog = new Blog();

            #image upload
            if ($image) {
                $path = "/photos/blogs";
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

                $blog->image = $imageurl;

            }

            $blog->category = $request->category;
            $blog->save();

            $datacontent = [];
            foreach (languages() as $lang) {
                $lang = $lang->code;

                $name = request('name_' . $lang);
                $content = request('content_' . $lang);
                $metacontent = request('metacontent_' . $lang);
                $metakeywords = request('metakeywords_' . $lang);

                if ($lang != null and $name != null) {
                    $data = [
                        'blog_id' => $blog->id,
                        'lang' => $lang,
                        'name' => $name,
                        'content' => $content,
                        'meta_content' => $metacontent,
                        'meta_keywords' => $metakeywords
                    ];
                    array_push($datacontent, $data);
                }
            }

            DB::table('blog_contents')->insert($datacontent);

        } catch (\Exception $exception) {
            DB::rollBack();
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Blog yazısı yaddaşa yazılarkən xəta baş verdi xahiş edirik yeniden yoxlayın. Xəta : '.$exception->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];

            return back()->with('feedback', $feedbackdata);
        }
        DB::commit();
        $feedbackdata = ['title' => 'Başarılı !',
            'text' => 'Blog yazısı uğurla yaddaşa yazıldı',
            'icon' => 'success',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);

    } //end blogstore

    public function blogedit($id){
        $blog = Blog::find($id);
        $categories = BlogCategory::all();
        return view('Admin.pages.blogedit',compact(['blog','categories']));
    }//end blogedit

    public function blogupdate($id, Request $request)
    {

# step 1_________________________;
        try {

            $image = $request->file('image');

            $blog = Blog::find($id);

            if ($image) {
                $path = "/photos/blogs";
                $imagepath = public_path() . $path;
                if ($image->isValid()) {
                    $newimagename = rand(1, 100) . time() . '.' . $image->getClientOriginalExtension();

                    $location = $imagepath . '/' . $newimagename;
                    $imageurl = $path . '/' . $newimagename; //for DB
                    makedirectory($path);
                    deleteimage(public_path($blog->image));
                    $response =   compressImage(['source' => $image, 'destination' => $location]);
                    if ($response != true){
                        $image->move($imagepath, $newimagename);
                    }
                }

                $blog->image = $imageurl;

            }

            $blog->category = $request->category;
            $blog->save();
# end step 1_________________________;
            $blog_content = DB::table('blog_contents')->where('blog_id', $id)->get();
            $datacontent = [];

            if ($blog_content->isEmpty()) {
                foreach (languages() as $lang) {
                    $lang = $lang->code;
                    $name = request('name_' . $lang);
                    $content = request('content_' . $lang);
                    $metacontent = request('metacontent_' . $lang);
                    $metakeywords = request('metakeywords_' . $lang);

                    if ($name != null) {
                        $data = [
                            'blog_id' => $blog->id,
                            'lang' => $lang,
                            'name' => $name,
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
                    $thisrow = DB::table('blog_contents')->where('blog_id', $id)->where('lang',$lang->code)->first();


                    if ( $thisrow != NULL) {
                        $name = request('name_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'blog_id' => $blog->id,
                                'lang' => $lang->code,
                                'name' => $name,
                                'content' => $content,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            DB::table('blog_contents')->where('id',$thisrow->id)->update($data);
                        }//end if null

                    }

                    else {//endif language code
                        $name = request('name_' . $lang->code);
                        $content = request('content_' . $lang->code);
                        $metacontent = request('metacontent_' . $lang->code);
                        $metakeywords = request('metakeywords_' . $lang->code);

                        if ($name != null) {
                            $data = [
                                'blog_id' => $blog->id,
                                'lang' => $lang->code,
                                'name' => $name,
                                'content' => $content,
                                'meta_content' => $metacontent,
                                'meta_keywords' => $metakeywords
                            ];
                            array_push($datacontent, $data);
                        }
                    }//else
                }
            }//else
            DB::table('blog_contents')->insert($datacontent);

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Blog yazısı  uğurla redaktə edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Blog yazısı redaktə edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }//end cache

    }//end blogupdate

    public function blogdelete($id){

        DB::beginTransaction();
        try {

            $blog = Blog::find($id);
            deleteimage(public_path($blog->image));
            $blog->delete();
            BlogContent::where('blog_id',$id)->delete();
            DB::commit();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Blog yazısı uğurla silindi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){
            DB::rollBack();

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Blog yazısı silinərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }

    ################################################################
    #        END BLOG SECTION
    ################################################################




    ################################################################
    #        FAQ SECTION
    ################################################################

    public function faq(){
        $items = FAQ::all();
        return view('Admin.pages.faqpage',compact(['items']));
    }

    public function faqstore(Request $request){

        DB::beginTransaction();
        try {
            $faq = new FAQ();

            $faq->show = 0;
            $faq->save();

            $datacontent = [];
            foreach (languages() as $lang) {
                $lang = $lang->code;

                $question = request('question_' . $lang);
                $answer = request('answer_' . $lang);

                if ($lang != null and $question != null) {
                    $data = [
                        'faq_id' => $faq->id,
                        'lang' => $lang,
                        'question' => $question,
                        'answer' => $answer,
                    ];
                    array_push($datacontent, $data);
                }
            }

            DB::table('faq_contents')->insert($datacontent);

        } catch (\Exception $exception) {
            DB::rollBack();
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Sual və Cavab yaddaşa yazılarkən xəta baş verdi xahiş edirik yeniden yoxlayın. Xəta : '.$exception->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];

            return back()->with('feedback', $feedbackdata);
        }
        DB::commit();
        $feedbackdata = ['title' => 'Başarılı !',
            'text' => 'Sual və Cavab uğurla yaddaşa yazıldı',
            'icon' => 'success',
            'button' => 'Bağla',];
        return back()->with('feedback', $feedbackdata);

    } //end faqstore


    public function faqupdate($id, Request $request){


        try {

            $faq_content = DB::table('faq_contents')->where('faq_id', $id)->get();
            $datacontent = [];

            if ($faq_content->isEmpty()) {

                foreach (languages() as $lang) {
                    $lang = $lang->code;
                    $question = request('question_' . $lang);
                    $answer = request('answer_' . $lang);

                    if ($question != null) {
                        $data = [
                            'faq_id' => $id,
                            'lang' => $lang,
                            'question' => $question,
                            'answer' => $answer
                        ];
                        array_push($datacontent, $data);
                    }
                }

            }

            else {

                foreach (languages() as $lang) {
                    $thisrow = DB::table('faq_contents')->where('faq_id', $id)->where('lang',$lang->code)->first();

                    $question = request('question_' . $lang->code);
                    $answer = request('answer_' . $lang->code);

                    if ( $thisrow != NULL) {

                        $answer = request('answer_' . $lang->code);

                        if ($question != null) {
                            $data = [
                                'faq_id' => $id,
                                'lang' => $lang->code,
                                'question' => $question,
                                'answer' => $answer
                            ];

                          DB::table('faq_contents')->where('id',$thisrow->id)->update($data);
                        }//end if null

                    }
                    else {//endif language code
                        $question = request('question_' . $lang->code);
                        $answer = request('answer_' . $lang->code);
                        if ($question != null) {
                            $data = [
                                'faq_id' => $id,
                                'lang' => $lang->code,
                                'question' => $question,
                                'answer' => $answer
                            ];
                            array_push($datacontent, $data);
                        }
                    }//else
                }
            }//else

            DB::table('faq_contents')->insert($datacontent);

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Sual və Cavab uğurla redaktə edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Sual və Cavab redaktə edilərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }//end cache
    }//end fqupdate


    public function faqdelete($id,Request $request){

        DB::beginTransaction();
        try {

            $faq = FAQ::find($id);
            deleteimage(public_path($faq->image));
            $faq->delete();
            FaqContent::where('faq_id',$id)->delete();
            DB::commit();

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Sual və Cavab uğurla silindi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){
            DB::rollBack();

            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Sual və Cavab silinərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }
    ################################################################
    #        END BLOG SECTION
    ################################################################



    ################################################################
    #        Message SECTION
    ################################################################

    public function messages(){
        $messages = Message::orderBy('show','DESC')->get();
        return view('Admin.pages.messages',compact(['messages']));
    }

    public function messageread($id){
        $message = Message::find($id);
            $message->show = 1;
            $message->save();
        return view('Admin.pages.messageread',compact(['message']));
    }

    public function messagedelete($id){

        try {
            $message = Message::find($id) ;

            $message->delete();


            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Mesaj uğurla silindi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

        }catch (\Exception $e){


            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Mesaj  silinərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }

}
