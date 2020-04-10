<?php

namespace App\Http\Controllers;


use App\Category;
use App\Classes\CurrencyRates;
use App\Currency;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Product;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
	public function index(ProductFilterRequest $request)
	{
		CurrencyRates::getRates();

		$productsQuery = Product::with('category');

		if ($request->filled('price_from')) {
			$productsQuery->where('price', '>=', $request->price_from);
		}

		if ($request->filled('price_to')) {
			$productsQuery->where('price', '<=', $request->price_to);
		}

		foreach(['hit', 'new', 'recommend'] as $field) {
			if($request->has($field)) {
				$productsQuery->$field();
			}
		}

		$products = $productsQuery->paginate(9)->withPath("?".$request->getQueryString());

		return view('index', compact('products'));
	}

	public function categories()
	{
		return view('pages.categories');
	}

	public function category($code)
	{
		$category = Category::where('code', $code)->first();
		return view('pages.category', compact('category'));
	}

	public function product($category, $productCode)
	{
		$product = Product::withTrashed()->byCode($productCode)->firstOrFail();
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

	public function subscribe(SubscriptionRequest $request, Product $product)
	{
		Subscription::create([
			'email' => $request->email,
			'product_id' => $product->id,
		]);

		return redirect()->back()->with('success', 'Спасибо мы сообщим вам о поступлении товара !');
	}

	public function changeCurrency($currencyCode)
	{
		$currency = Currency::byCode($currencyCode)->firstOrFail();
		session(['currency' => $currency->code]);
		return redirect()->back();
	}
}
