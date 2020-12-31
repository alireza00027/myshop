<?php

use Illuminate\Support\Facades\Route;



Route::get('/','DashboardController@index')->name('dashboard');

//products Routing
Route::resource('products','ProductController');
//categories Routing
Route::resource('categories','CategoryController');
//tags Routing
Route::resource('tags','TagController');
//metas Routing
Route::get('insertMeta/{product}','MetaController@insert')->name('meta.insert');
Route::post('/saveMeta','MetaController@store')->name('meta.store');
Route::resource('metas','MetaController')->only('edit','update','destroy');
//users Routing
Route::get('/users','UserController@index')->name('users.index');
Route::post('/users/{user}','UserController@destroy')->name('users.destroy');
//states Routing
Route::resource('states','StateController');
//cities Routing
Route::resource('cities','CityController');
