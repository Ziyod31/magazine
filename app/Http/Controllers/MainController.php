<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		$products = Product::latest()->paginate(9);
		return view('index', compact('products'));
	}

	public function categories()
	{
		$categories = Category::get();
		return view('pages.categories', compact('categories'));
	}

	public function category($code)
	{
		$category = Category::where('code', $code)->first();
		return view('pages.category', compact('category'));
	}

	public function product($category, $product = null)
	{
		$category = Category::get();
		return view('pages.product', ['product' => $product], compact('category'));
	}

	public function basket()
	{
		return view('pages.basket');
	}

	public function basketPlace()
	{
		return view('pages.order');
	}
}
