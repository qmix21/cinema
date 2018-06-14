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

Route::get('/cinemas','CinemaController@index');
Route::get('/cinemas/{id}','CinemaController@show');
Route::get('/cinemas','CinemaController@store');
Route::put('/cinemas/{id}','CinemaController@update');
Route::delete('/cinemas/{id}','CinemaController@delete');
