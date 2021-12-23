<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

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
        return redirect()->route('site.home');
    }
}
