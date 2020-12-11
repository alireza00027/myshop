<?php

use Illuminate\Support\Facades\Route;



Route::get('/','DashboardController@index')->name('dashboard');


Route::resource('products','ProductController');
Route::resource('categories','CategoryController');
Route::resource('tags','TagController');
