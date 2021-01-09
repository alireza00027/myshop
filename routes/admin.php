<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','isAdmin'])->group(function (){
    Route::get('/','DashboardController@index')->name('dashboard');



    Route::middleware('can:products-management')->group(function (){
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
    });


    Route::middleware('can:users-management')->group(function (){
        Route::prefix('/users')->group(function (){
            Route::resource('level','LevelAdminController',['parameters'=>['level'=>'user']]);
            //users Routing
            Route::get('/','UserController@index')->name('users.index');
            Route::post('/{user}','UserController@destroy')->name('users.destroy');
            Route::post('/setAdmin/{user}','UserController@setAdmin')->name('users.setAdmin');

        });
//roles Routing
        Route::resource('roles','RoleController');
    });



    Route::middleware('can:addresses-management')->group(function (){
        //states Routing
        Route::resource('states','StateController');
//cities Routing
        Route::resource('cities','CityController');
    });


//orders Routing
    Route::prefix('/orders')->middleware('can:orders-management')->group(function(){
        Route::get('/processing','OrderController@indexProcessingOrders')->name('orders.processing.index');
        Route::post('processing/confirm/{order}','OrderController@confirm')->name('orders.processing.confirm');
        Route::get('processing/{order}','OrderController@showProcessingOrder')->name('orders.processing.show');
        Route::get('/','OrderController@index')->name('admin.orders.index');
        Route::get('/{order}','OrderController@show')->name('admin.orders.show');
    });
});

