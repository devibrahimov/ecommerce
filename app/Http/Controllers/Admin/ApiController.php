<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCurrencies(){
        $thisday =  date('d.m.Y');

        $yesterday = strtotime('-1 day',strtotime($thisday));
        $yesterday = date('d.m.Y',$yesterday);

        $url = 'https://cbar.az/currencies/'.$thisday.'.xml';

        $site = simplexml_load_file($url);

        return $site ;
    }
}
