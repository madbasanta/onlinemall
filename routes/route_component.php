<?php
/*
	BANNER
*/
Route::get('admin/component/banner', 'ComponentController@getBanner');
Route::get('admin/component/banner/add', 'ComponentController@addForm');


// uploading banner images
Route::post('admin/component/banner/store', 'ComponentController@addImage');
Route::post('admin/component/banner/remove', 'ComponentController@removeImage');


/*
	PASALS
*/
Route::get('admin/component/pasals', 'ComponentController@getPasals');
Route::get('admin/component/pasals/add', 'ComponentController@addPasal');
Route::get('admin/component/pasals/list', 'ComponentController@pasalList');
// adding pasal
Route::post('admin/component/pasals/store', 'ComponentController@storePasal');
Route::post('admin/component/pasals/remove', 'ComponentController@removePasal');