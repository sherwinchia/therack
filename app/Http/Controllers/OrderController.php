<?php

namespace App\Http\Controllers;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders.index',compact(['orders']));
    }
}