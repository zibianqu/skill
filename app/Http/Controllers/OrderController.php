<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function orderStep1(){
        try{
            $title="确认订单";
            return view('order_step1',compact('title'));
        }catch (\Exception $e){
            $title="404";
            return view('404',compact('title'));
        }
    }
}
