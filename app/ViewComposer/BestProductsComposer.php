<?php

namespace App\ViewComposer;

use App\Order;
use App\Product;
use Illuminate\View\View;

class BestProductsComposer
{
	public function compose(View $view)
	{
		$bestProduct = Order::get()->map->products->flatten()->map->pivot->mapToGroups(function ($pivot) {
			return [$pivot->product_id => $pivot->count];
		})->map->sum()->sortBy('DESC')->take(3)->keys()->toArray();

		$bestProducts = Product::whereIn('id', $bestProduct)->get();
		$view->with('bestProducts', $bestProducts);
	}
}