<?php

Route::get('admin/site-settings', 'SettingController@index');
Route::post('admin/site-settings/store', 'SettingController@store');

Route::get('admin/site-settings/{setting}/edit', 'SettingController@editForm');
Route::post('admin/site-settings/{setting}/update', 'SettingController@update');

Route::post('admin/site-settings/{setting}/delete', 'SettingController@delete');