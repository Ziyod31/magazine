<?php


Auth::routes([
	'reset' => false,
	'confirm' => false,
	'verify' => false,
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
	Route::group(['middleware' => 'is_admin'], function() {
		Route::get('/orders', 'OrderController@index')->name('order');
	});

	Route::resource('categories', 'CategoryController');
});

Route::get('/', 'MainController@index')->name('index');

Route::get('/categories', 'MainController@categories')->name('cats');

Route::get('/basket', 'BasketController@basket')->name('basket');

Route::get('/basket/place', 'BasketController@basketPlace')->name('basket-place');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');

Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');

Route::post('/basket/place', 'BasketController@basketConfirm')->name('basket-confirm');

Route::get('/{category}', 'MainController@category')->name('category');

Route::get('/{category}/{product}', 'MainController@product')->name('product');