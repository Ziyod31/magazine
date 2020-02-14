<?php


Auth::routes([
	'reset' => false,
	'confirm' => false,
	'verify' => false,
]);

Route::get('reset', 'MainController@reset')->name('reset');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function() {
	Route::group(['prefix' => 'person'], function() {
		Route::get('/orders', 'OrderController@index')->name('orders.index');
		Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
	});

	Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
		Route::group(['middleware' => 'is_admin'], function() {
			Route::get('/orders', 'OrderController@index')->name('order.index');
			Route::get('/orders/{order}', 'OrderController@show')->name('order.show');
		});

		Route::resource('categories', 'CategoryController');
		Route::resource('products', 'ProductController');
	});
});

Route::get('/', 'MainController@index')->name('index');
Route::get('/categories', 'MainController@categories')->name('cats');

Route::group(['prefix' => 'basket'], function() {
	Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');

	Route::group(['middleware' => 'basket_check'], function() {
		Route::get('/', 'BasketController@basket')->name('basket');
		Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
		Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
		Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
	});
});


Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product}', 'MainController@product')->name('product');