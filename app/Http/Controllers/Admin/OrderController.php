<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::where('status', 1)->paginate(10);
    	return view('admin.orders', compact('orders'));
    }

    public function show(Order $order)
    {
    	return view('admin.show', compact('order'));
    }
}
