<?php

/*
	All routes related to product
	FRONTEND
*/
Route::get('/product', 'ProductShowController@index');

Route::get('/product/{inv}/{name?}', 'ProductShowController@showProduct');

// index items
Route::get('/fetch/indexItems', 'ProductShowController@indexItems');
// recommended items
Route::get('/fetch/recommendedItems', 'ProductShowController@recommendedItems');
// recommended items for shop
Route::get('/fetch/shop/recommendedItems', 'ProductShowController@recommendedItems');

/*
	BACKEND
*/
