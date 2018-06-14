<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cinemas','CinemaController@index');
Route::get('/cinemas/{id}','CinemaController@show');
Route::get('/cinemas','CinemaController@store');
Route::put('/cinemas/{id}','CinemaController@update');
Route::delete('/cinemas/{id}','CinemaController@delete');

