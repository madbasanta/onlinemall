<?php

Route::get('pasal/{shop}', 'FrontendShopController@index');

Route::get('frontend/categories', 'FrontendController@getCategories');

/*
	CART
*/
Route::get('cart', 'FrontendController@cart');
Route::get('checkout', 'FrontendController@checkout')->middleware('auth');

Route::post('checkout', 'FrontendController@makeOrder')->middleware('auth');

// cart items

Route::get('cart/items', 'FrontendController@cartItems');

Route::get('search', 'FrontendShopController@search');

Route::post('search', 'FrontendShopController@searchResults');