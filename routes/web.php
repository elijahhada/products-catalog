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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'ProductController@index')->name('list');
Route::get('create-product', 'ProductController@create')->name('create');
Route::post('store-product', 'ProductController@store')->name('store');
Route::get('show-product/{id}', 'ProductController@show')->name('show');