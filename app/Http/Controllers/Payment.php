<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class Payment extends Controller
{
    public function index(){
        return view('razorpay');
    }
    public function payment(Request $request){
        $amount = $request->amount;
        $api = new Api(env('rzr_key'),env('rzr_secret'));
        $order_data = [
            'receipt' => 'order_'.rand(1000,9999),
            'amount' => $amount * 100,
            'currency' => 'INR',
        ];
        $order = $api->order->create($order_data);
        // echo $order["id"];
        return view('dashboard.payment',['order'=>$order["id"],'amount'=>$amount*100]);
    }
}
