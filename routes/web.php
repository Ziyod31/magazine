<?php

Route::get('/', 'MainController@index');
Route::get('/categories', 'MainController@categories')->name('category');
Route::get('/{category}', 'MainController@category');
Route::get('/product/{product}', 'MainController@product');