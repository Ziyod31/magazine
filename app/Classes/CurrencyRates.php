<?php

namespace App\Classes;

use Exeption;
use App\Classes\CurrencyConversion;
use GuzzleHttp\Client;


class CurrencyRates
{
	public static function getRates()
	{
		$baseCurrency = CurrencyConversion::getBaseCurrency();

		$url = config('currency.api') . '?base=' . $baseCurrency->code;

		$client = new Client();

		$response = $client->request('GET', $url);

		if($response->getStatusCode() !== 200) {
			throw new Exeption('There is a problem with currency rate service!');
		}

		$rates = json_decode($response->getBody()->getContents(), true)['rates'];

		foreach(CurrencyConversion::getCurrencies() as $currency) {
			if(!$currency->isMain()) {
				if(!isset($rates[$currency->code])) {
					throw new Exeption('There is a problem with currency ' . $currency->code);
				} else {
					$currency->update(['rate' => $rates[$currency->code]]);
					$currency->touch();
				}
			}
		}
	}
}