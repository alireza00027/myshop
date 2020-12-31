<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('products','ProductController@index')->name('products.list');
Route::get('/products/{productSlug}','ProductController@single')->name('product.single');
Route::get('categories/{categorySlug}','CategoryController@showList')->name('categories.showList');
Route::get('tags/{tagSlug}','TagController@showList')->name('tags.showList');
Route::post('/cartAddItem/{product}','CartController@add')->name('carts.addItem');
Route::get('cart','CartController@show')->name('carts.show');
Route::delete('cartItems/{cartItem}','CartController@destroyCartItem')->name('cartItems.destroy');

Route::middleware('auth')->prefix('/panel')->group(function(){
    Route::get('/','PanelController@index')->name('dashboard');
    Route::get('/{user}/edit','PanelController@edit')->name('user.edit');
    Route::patch('/{user}','PanelController@update')->name('user.update');

});
Route::resource('addresses','AddressController')->middleware('auth');
