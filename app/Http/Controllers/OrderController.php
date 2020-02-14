<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
	public function index()
	{

		$orders = Auth::user()->orders()->active()->latest()->paginate(10);
		return view('admin.orders', compact('orders'));
	}

	public function show(Order $order)
	{
		if(!Auth::user()->orders->contains($order)) {
			return back();
		}
		return view('admin.show', compact('order'));
	}
}
