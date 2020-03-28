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

Route::name('home')->get('/', 'ProductController@index');
Route::name('product')->get('/product/{id}', 'ProductController@product');
Route::name('cart')->get('/cart', 'ProductController@cart');
Route::name('tocart')->post('/tocart', 'ProductController@tocart');
