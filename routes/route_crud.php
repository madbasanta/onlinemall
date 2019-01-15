<?php
Route::group(['admin'], function() {
	Route::get('admin/mod/{model}', 'CrudController@loadTable');
	Route::get('admin/table/getData', 'CrudController@loadTableData');

	Route::get('admin/add/{mod}', 'CrudController@addForm');
	Route::post('admin/create/{mod}', 'CrudController@postForm'); 
	Route::post('admin/delete/{mod}/{id}', 'CrudController@destroy');
	Route::get('admin/editOne/{mod}/{id}', 'CrudController@editOne');
	Route::post('admin/update/{mod}/{id}', 'CrudController@updateOne');

	/* DETAILS */
	Route::get('admin/mod/{model}/{id}', 'CrudController@showOne');
	
	Route::get('admin/mod/orderdetails', 'CrudController@showOrder');

	Route::get('admin/getOptions/{mod}', 'CrudController@loadOptions');

	/* SUB ADDING FORM */
	Route::get('load/sub-form/{mod}', 'CrudController@loadSubForm');
});
