<?php

use Illuminate\Support\Facades\Route;



Route::get('/','DashboardController@index')->name('dashboard');


Route::resource('products','ProductController');
Route::resource('categories','CategoryController');
Route::resource('tags','TagController');
//metas Routing
Route::get('insertMeta/{product}','MetaController@insert')->name('meta.insert');
Route::post('/saveMeta','MetaController@store')->name('meta.store');
Route::resource('metas','MetaController')->only('edit','update','destroy');
