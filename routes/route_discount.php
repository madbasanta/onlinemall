<?php 
Route::get('admin/static/discounts/{id}', 'DiscountController@showDiscount');

Route::get('admin/static/discounts', 'DiscountController@discounts');

Route::get('admin/inventory/{inventory}/discount/add', 'DiscountController@addInvDiscount');

Route::get('admin/inventory/{inventory}/discount/{discount}/edit', 'DiscountController@editInvDiscount');

Route::post('admin/inventory/{inventory}/discount/store', 'DiscountController@storeInvDiscount');

Route::post('admin/inventory/{inventory}/discount/{discount}/update', 'DiscountController@updateInvDiscount');

Route::post('admin/inventory/{inv}/discountRemove', 'DiscountController@removeDis');