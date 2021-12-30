<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function register(){
        return view('Template.pages.customer.register');
    }

    public function registerstore(CustomerRegisterRequest $request){

        $customer = Customer::create($request->validated());

    }



    public function login(){
        return view('Template.pages.customer.login');
    }

    public function logincontrol(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Email alanını boş bırakamazsınız',
            'email.email'=>'Email alanını email yazılım kurallarına uymuyor',
            'password.required'=>'Email alanını boş bırakamazsınız'
        ]);

        if ( $a= auth()->guard('customer')->attempt(['email'=>$request->email,'password'=> $request->password]) ){
            request()->session()->regenerate();

           return redirect()->intended('/') ;
        }else{
            $errors = ['email'=>'Yanlış giriş məlumatları'];

            return back()->withErrors($errors);
        }

    }


    public function  logout(){
        \auth()->guard('customer')->logout();
        \request()->session()->flush();
        \request()->session()->regenerate();
        return redirect()->route('site.index');
    }



    public function accountupdate(Request $request){
        $userid = auth('customer')->user()->id;
       $validated = $this->validate($request,[
            'name'=>'required',
            'surname'=>'required',
            'phone_number'=>'required',
            'adress'=>'required' ,

        ]);
       if ($validated){

        $customer = Customer::find($userid);

        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->phone_number = $request->phone_number;
        $customer->adress = $request->adress;
        $save = $customer->save();

       }

        if ($save){
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Profil məlumatları uğurla qeyd yeniləndi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }else{
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Profil məlumatları yenilənkən xəta baş verdi. ' ,
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }


    public function passwordupdate(Request $request){
        $userid = auth('customer')->user()->id;

        if ($request->password != null ){

            $validated=  $this->validate($request,[
                 'oldpassword'=>'required',
                 'password'=>'required|confirmed' ,

             ]);
             if ($validated){

                 $customer =   Customer::findOrFail($userid);

                 if (Hash::check($request->oldpassword,$customer->password)){
                     $save=   $customer->fill([
                         'password' => Hash::make($request->password)
                     ])->save();
                 }

             }
        }

        if ($save){
            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Şifrəniz uğurla yeniləndi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }else{
            $feedbackdata = ['title' => 'Başarısız !',
                'text' => 'Şifrəniz yenilənkən xəta baş verdi. ' ,
                'icon' => 'warning',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);
        }

    }


}
