<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function register(){
        return view('Template.pages.customer.register');
    }

    public function registerstore(Request $request){

        $request->name;
        $request->surname;
        $request->phone_number;
        $request->email;
        $request->password;
        $request->password_confirm;
        $request->adress;

    }



    public function login(){
        return view('Template.pages.customer.login');
    }

    public function logincontrol(Request $request){

    }
}
