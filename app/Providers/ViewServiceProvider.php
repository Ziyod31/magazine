<?php

namespace App\Providers;

use App\Classes\CurrencyConversion;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.main', 'pages.categories'], 'App\ViewComposer\CategoriesComposer');

        View::composer(['layouts.main'], 'App\ViewComposer\BestProductsComposer');

        View::composer(['layouts.main'], 'App\ViewComposer\CurrencyComposer');
        View::composer('*', function($view) {
            $currencySymbol = CurrencyConversion::getCurrencySymbol();
            $view->with('currencySymbol', $currencySymbol);
        });
    }
}
