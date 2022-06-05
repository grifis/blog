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

Route::get('/','PostController@page_change');
Route::get('/weathers/rainy/{weather}', 'WeatherController@index_rainy');
Route::get('/weathers/sunny/{weather}', 'WeatherController@index_sunny');
Route::get('/weathers/rainy/{weather}/posts/create', 'WeatherController@create_rainy');
Route::get('/weathers/sunny/{weather}/posts/create', 'WeatherController@create_sunny');

Route::post('/posts', 'PostController@store');

