<?php

Route::get('admin/static/inventories/{inventory}', 'InventoryController@showInventory')->middleware('admin');

Route::get('admin/order/{order}/inventories/getData', 'InventoryController@getData')->middleware('admin');

Route::post('admin/fileupload/inventories/{inv}', 'InventoryController@fileUpload')->middleware('admin');

Route::get('inventoryImage/{file}', 'InventoryController@file');
Route::get('imgSrc/inv/{inv}', 'InventoryController@fileSrc');
Route::get('shopImage/{file}', 'InventoryController@file');

Route::post('admin/inventoryImage/remove/{inv}/{file}', 'InventoryController@fileRemove')->middleware('admin');