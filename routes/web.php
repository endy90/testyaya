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


Route::group([
    'middleware'=>'App\Http\Middleware\Auth'
],function(){
    Route::get('/updatemembre/{id}','App\Http\Controllers\AdminController@form_update_membre')->name('update.User')->middleware('is_admin');
    Route::post('/updatemembre','App\Http\Controllers\AdminController@update_membre')->middleware('is_admin');
    Route::get('Portal/dashboard','App\Http\Controllers\AdminController@dashboard')->middleware('is_admin');
    Route::get('Portal/membre','App\Http\Controllers\AdminController@membre')->middleware('is_admin');
    Route::get('Portal/product','App\Http\Controllers\AdminController@product')->middleware('is_admin');
    Route::get('/createproduct','App\Http\Controllers\AdminController@form_createproduct')->middleware('is_admin');
    Route::post('/createproduct','App\Http\Controllers\AdminController@createproduct')->middleware('is_admin');
    Route::get('/updateproduct/{id}','App\Http\Controllers\AdminController@form_update_product')->name('update.Product')->middleware('is_admin');
    Route::post('/updateproduct','App\Http\Controllers\AdminController@update_product')->middleware('is_admin');
    Route::delete('/deleteproduct/{id}','App\Http\Controllers\AdminController@delete_product')->name('delete.Product')->middleware('is_admin');
    Route::get('/signout','App\Http\Controllers\LoginController@signout');
});


Route::get('/forgotpassword','App\Http\Controllers\AdminController@forgotpassword');

Route::get('/register','App\Http\Controllers\RegisterController@register');
Route::post('/register','App\Http\Controllers\RegisterController@createUser');


Route::get('/login','App\Http\Controllers\LoginController@login');
Route::post('/login','App\Http\Controllers\LoginController@connexion');

Route::get('/', 'App\Http\Controllers\ClientsController@index');
Route::get('/index', 'App\Http\Controllers\ClientsController@index');

Route::group([
    'middleware'=>'App\Http\Middleware\Auth',
],function(){
    Route::get('/profile', 'App\Http\Controllers\ClientsController@profile');
    Route::get('/updateprofile', 'App\Http\Controllers\ClientsController@form_updateprofile');
    Route::post('/updateprofile', 'App\Http\Controllers\ClientsController@updateprofile');
    Route::post('/comment', 'App\Http\Controllers\ClientsController@comment');
    Route::get('/cart-checkout', 'App\Http\Controllers\CartsController@cart')->name('cart.checkout');;
    Route::post('/cart-add', 'App\Http\Controllers\CartsController@add')->name('cart.add');
    Route::post('/cart-clear', 'App\Http\Controllers\CartsController@clear')->name('cart.clear');
    Route::post('/payment', 'App\Http\Controllers\CartsController@payment')->name('cart.payment');
});
Route::post('/search', 'App\Http\Controllers\ClientsController@search');

Route::get('/product/{id}', 'App\Http\Controllers\ProductsController@product');
