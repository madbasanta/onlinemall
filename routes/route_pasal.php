<?php 
Route::get('admin/static/pasals/{id}', 'PasalController@showPasal');	

Route::get('admin/pasal/{pasal}/inventories/getData', 'PasalController@getData');

Route::post('admin/pasal/{pasal}/inventories/remove/{inv}', 'PasalController@removeInv');

Route::post('admin/shop/{shop}/cat/{cat}', 'PasalController@removeCat');

Route::get('admin/pasal/{shop}/categories/getData', 'PasalController@getCatData');

Route::get('admin/shop/{shop}/subModal/{mod}', 'PasalController@addCategory');

Route::get('admin/shop/brief', 'PasalController@brief');

Route::post('admin/image/shop/{shop}', 'PasalController@uploadImage');
