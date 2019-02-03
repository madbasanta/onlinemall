<?php 

Route::get('admin/static/orders/{id}', 'OrderController@showOrder');

Route::get('admin/inventory/{inventory}/orders/add', 'OrderController@addForm');

Route::get('admin/static/getOptions/products', 'OrderController@getProductOptions');

Route::get('admin/inventory/{inventory}/orders/getData', 'OrderController@getData');

Route::post('admin/inventory/order', 'OrderController@createOrder');

Route::get('admin/inventory/orders/edit/{order}', 'OrderController@editOrder');

Route::post('admin/inventory/order/update/{order}', 'OrderController@updateOrder');

// remove order
Route::post('admin/orders/remove/{order}', 'OrderController@removeOrder');

//remove inventory
Route::post('admin/order/{order}/inventories/remove/{inv_id}', 'OrderController@removeInv');

Route::post('admin/orders/{order}/markShipped', 'OrderController@markShipped');

// latest orders dashboard
Route::get('admin/latest/orders', 'OrderController@latestOrders');