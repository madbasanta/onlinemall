<?php
Route::group(['admin'], function() {
	Route::get('admin/mod/{model}', 'CrudController@loadTable');
	Route::get('admin/table/getData', 'CrudController@loadTableData');

	Route::get('admin/add/{mod}', 'CrudController@addForm');
	Route::post('admin/create/{mod}', 'CrudController@postForm');
});
