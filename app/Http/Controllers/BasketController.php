<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
	public function basket()
	{
		$order = (new Basket())->getOrder();

		return view('pages.basket', compact('order'));
	}

	public function basketPlace()
	{
		$basket = new Basket();
		$order = $basket->getOrder();
		if(!$basket->countAvailable())
		{
			session()->flash('warning', 'Товар'.' - '.$product->name . 'в указанном количестве не доступен!');
			return redirect()->route('basket');
		}
		return view('pages.order', compact('order'));
	}

	public function basketConfirm(Request $request)
	{
		if((new Basket())->saveOrder($request->name, $request->phone)) {
			session()->flash('success', 'Заказ принят на разработку');
		}

		else {
			session()->flash('warning', 'Товар не доступен в указанном количестве!');
		}

		Order::eraseFullPrice();

		return redirect()->route('index');
		
	}

	public function basketAdd(Product $product)
	{
		$result = (new Basket(true))->addProduct($product);

		if($result) {
			session()->flash('success', 'Добален товар'.' - '. $product->name);
		} 
		else {
			session()->flash('warning', 'Товар не доступен в указанном количестве!');
		}

		return redirect()->route('basket');
		
	}

	public function basketRemove(Product $product)
	{
		(new Basket())->removeProduct($product);

		session()->flash('warning', 'Удалён товар'.' - '.$product->name);	

		return redirect()->route('basket');
	}
}
