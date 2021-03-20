<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\MpesaTransaction;

class OrderController extends Controller
{
    public function orders(){
		$orders =Order::get();
    	return view('admin.orders')->with('orders', $orders);
	}
}
