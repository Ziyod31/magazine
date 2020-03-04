<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::latest()->paginate(10);
    	return view('admin.orders', compact('orders'));
    }

    public function show(Order $order)
    {
    	$products = $order->products()->withTrashed()->get();
    	return view('admin.show', compact('order', 'products'));
    }
}
