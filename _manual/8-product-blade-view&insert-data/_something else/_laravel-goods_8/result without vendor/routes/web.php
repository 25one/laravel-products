<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::name('home')->get('/', 'GoodController@index');
Route::name('product')->get('/product/{id}', 'GoodController@product');
Route::name('cart')->get('/cart', 'GoodController@cart');
Route::name('tocart')->post('/tocart', 'GoodController@tocart');
