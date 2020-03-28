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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::name('home')->get('/', 'ProductController@index');
Route::name('product')->get('/product/{id}', 'ProductController@product');
Route::name('cart')->get('/cart', 'ProductController@cart');
Route::name('tocart')->post('/tocart', 'ProductController@tocart');
Route::name('clearall')->post('/clearall', 'ProductController@clearall');
Route::name('removeone')->post('/removeone', 'ProductController@removeone');
Route::name('mailer')->post('/mailer', 'ProductController@mailer');

Route::middleware('admin')->group(function () {
   Route::name('dashboard')->get('/dashboard', 'AdminController@index');
   Route::resource('products', 'AdminController'); //RESTful - controllers
   Route::name('upload')->post('/upload', 'AdminController@upload');
});
