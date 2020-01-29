<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class MainController extends Controller
{
	public function index()
	{
		return view('index');
	}

	public function categories()
	{
		$categories = Category::all();
		return view('pages.categories', compact('categories'));
	}

	public function category($code)
	{
		$category = Category::where('code', $code)->first();
		return view('pages.category', compact('category'));
	}

	public function product($product = null)
	{

		return view('pages.product', ['product' => $product]);
	}
}
