<?php

namespace App\Classes;

use App\Classes\CurrencyConversion;
use App\Mail\OrderCreated;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class Basket
{
	protected $order;
	
	/** 
	* Basket constructor.
	* @param boot $createOrder
	*/

	public function __construct($createOrder = false)
	{
		$order = session('order');

		if(is_null($order) && $createOrder) {
			$data = [];
			if(Auth::check()) {
				$data['user_id'] = Auth::id();
			}

			$data['currency_id'] = CurrencyConversion::getCurrencyIdFromSession()->id;

			$this->order = new Order($data);
			session(['order' => $this->order]);
		} else {
			$this->order = $order;
		}
	}

	public function getOrder()
	{
		return $this->order;
	}

	public function countAvailable($updateCount = false)
	{

		$products = collect([]);

		foreach ($this->order->products as $orderProduct)
		{
			$product = Product::find($orderProduct->id);
			if($orderProduct->countOrder > $product->count) {
				return false;
			}

			if($updateCount) {
				$product->count -= $orderProduct->countOrder;
				$products->push($product);
			}
		}

		if($updateCount) {
			$products->map->save();
		}

		return true;
	}

	public function saveOrder($name, $phone, $email)
	{
		if(!$this->countAvailable(true)) {
			return false;
		}

		$this->order->saveOrder($name, $phone);

		Mail::to($email)->send(new OrderCreated($name, $this->getOrder()));

		return true;
	}

	public function removeProduct(Product $product)
	{
		if($this->order->products->contains($product)) {
			$pivotRow = $this->order->products->where('id', $product->id)->first();
			if($pivotRow->countOrder < 2) {
				$this->order->products()->pop($product);
			} else {
				$pivotRow->countOrder--;
			}	
		}
	}

	public function addProduct(Product $product)
	{
		if ($this->order->products->contains($product)) {
			$pivotRow = $this->order->products->where('id', $product->id)->first();
			if ($pivotRow->countOrder >= $product->count) {
				return false;
			}
			$pivotRow->countOrder++;
		} else {
			if ($product->count == 0) {
				return false;
			}
			$product->countOrder = 1;
			$this->order->products->push($product);
		}

		return true;
	}
}