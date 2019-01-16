<?php

Route::get('pasal', 'FrontendShopController@index');

Route::get('frontend/categories', 'FrontendController@getCategories');

/*
	CART
*/
Route::get('cart', 'FrontendController@cart');
Route::any('checkout', 'FrontendController@checkout');