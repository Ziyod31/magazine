<?php

namespace App\ViewComposer;

use App\Classes\CurrencyConversion;
use Illuminate\View\View;

class CurrencyComposer
{
	public function compose(View $view)
	{
		$currencies = CurrencyConversion::getCurrencies();
		$view->with('currencies', $currencies);
	}
}