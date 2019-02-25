<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@adminPanel')->name('admin');

// dashboard
Route::get('/admin/dashboard', 'HomeController@dashboard');
Route::get('admin/dashboard/content', 'HomeController@dashboardContent');


include 'route_admin.php';