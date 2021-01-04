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
//orders Routing
Route::prefix('/orders')->group(function(){
    Route::get('/','OrderController@index')->name('admin.orders.index');
    Route::get('/{order}','OrderController@show')->name('admin.orders.show');
    Route::prefix('/processing')->group(function (){
        Route::get('/','OrderController@indexProcessingOrders')->name('orders.processing.index');
        Route::post('/confirm/{order}','OrderController@confirm')->name('orders.processing.confirm');
        Route::get('/{order}','OrderController@showProcessingOrder')->name('orders.processing.show');
    });
});
