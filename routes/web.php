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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/shuten/index', 'ShutenController@index');
Route::get('/shuten/logi', 'ShutenController@logi');
Route::post('/shuten/doadd', 'ShutenController@doadd');
Route::get('/shuten/doabb', 'ShutenController@doabb');
Route::get('/shuten/file', 'ShutenController@file');
Route::any('/shuten/dofile', 'ShutenController@dofile');

Route::get('/shuten/delete', 'ShutenController@delete');
Route::get('/shuten/update', 'ShutenController@update');
Route::post('/shuten/doupdate', 'ShutenController@doupdate');

Route::group(['middleware' => ['login']], function (){
	Route::get('/shuten/add', 'ShutenController@add');
	Route::any('/shuten/login', 'ShutenController@login');
	Route::any('/shuten/reg', 'ShutenController@reg');
	Route::any('/shuten/doreg', 'ShutenController@doreg');
	Route::any('/shuten/dologin', 'ShutenController@dologin');

});

