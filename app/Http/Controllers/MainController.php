<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

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

	public function product()
	{
		$product = Product::get();
		return view('pages.product', compact('product'));
	}

	public function reset()
	{
		Artisan::call('migrate:fresh --seed');

		foreach(['categories', 'products'] as $folder) {
			Storage::deleteDirectory($folder);
			Storage::makeDirectory($folder);

			$files = Storage::disk('reset')->files($folder);

			foreach($files as $file) {
				Storage::put($file, Storage::disk('reset')->get($file));
			}
		}

		session()->flash('success', 'Проект был сброшен в начальное состояние');
		return redirect()->route('index');
	}
}
