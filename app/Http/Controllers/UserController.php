<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        if (Auth::check()){
            return redirect()->route('admin.index');
        }else{
            return view('Admin.login');
        }

    }

      public function logincontrol(Request $request){
          $this->validate($request,[
              'email'=>'required|email|max:80',
              'password'=>'required|max:80'
          ],[
              'email.required'=>'Email alanını boş bırakamazsınız',
              'email.email'=>'Email alanını email yazılım kurallarına uymuyor',
              'password.required'=>'Email alanını boş bırakamazsınız'
          ]);

          if ( auth()->attempt([
              'email'=>$request->email,
              'password'=> $request->password,
          ])){
              request()->session()->regenerate();
              return redirect()->intended(route('admin.index')) ;
          }else{
              $errors = ['email'=>'Hatalı Giriş'];
              return back()->withErrors($errors);
          }



      }


    public function logout(){
        auth()->logout();
       \request()->session()->flush();
       \request()->session()->regenerate();
        return redirect()->route('site.index');
    }



    ################################################################
    #        ADMİN  SECTION
    ################################################################
    public function adminusers(){
        $users = User::all();
        return view('Admin.pages.adminuserpage',compact(['users']));
    }

    public function adminusersstore(Request $request){
        try {
            $user = new User();

            $user->name =   $request->username ;
            $user->email =   $request->emailaddress ;
            $user->password =   Hash::make($request->password) ;

            $user->save();
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Yeni Admin  uğurla əlavə edildi! ' ,
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

    public function adminusersupdate($id,Request $request){
        try {
            $user =   User::find($id);

            $user->name =   $request->username ;
            $user->email =   $request->emailaddress ;

            if (  $request->password != NULL )
            {
                $user->password =   Hash::make($request->password) ;
            }

            $user->save();
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Admin məlumatları uğurla yeniləndi! ' ,
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }catch (\Exception $e){
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Admin məlumatları yenilənərkən xəta baş verdi. Xəta: '.$e->getMessage(),
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }
    }

    public function userdelete($id,Request $request){
        try {
            User::find($id)->delete();
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'İsdifadəçi uğurla silindi',
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

    ################################################################
    #        END ADMİN  SECTION
    ################################################################
}
