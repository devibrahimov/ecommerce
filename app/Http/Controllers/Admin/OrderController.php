<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::join('payment','orders.payment_order_id','=','payment.order_id')->get();
        return view('Admin.pages.orders',compact(['orders']));
    }
}
