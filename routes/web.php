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

Route::get('/', 'ProductController@index');
Route::get('/create', 'ProductController@create');
Route::get('{id}', 'ProductController@show');
Route::post('/store', 'ProductController@store');
Route::get('/edit/{id}', 'ProductController@edit');
Route::put('/update/{id}', 'ProductController@update');
Route::delete('/{id}', 'ProductController@delete');