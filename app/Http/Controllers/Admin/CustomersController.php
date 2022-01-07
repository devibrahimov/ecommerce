<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
     public function index(){
         $customers = Customer::all();
         return view('Admin.pages.customers.index',compact(['customers']));
     }
}
