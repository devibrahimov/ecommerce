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

        var_dump($request->all());
        $customer = Customer::create($request->validated());

//        $request->name;
//        $request->surname;
//        $request->phone_number;
//        $request->email;
//        $request->password;
//        $request->password_confirm;
//        $request->adress;

    }



    public function login(){
        return view('Template.pages.customer.login');
    }

    public function logincontrol(Request $request){

    }
}
