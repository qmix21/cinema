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


 //// Unsure on how to use Api Auth , not going to use these functions..
//Route::post('register','UserController@register');
//Route::post('login','UserController@login');
//Route::post('logout','Auth\LoginController@logout');

//List All Cinemas
Route::get('cinemas','CinemaController@index');
//List Cinema from ID or Name
Route::get('cinema/{id}','CinemaController@show');


//List All Movies
Route::get('movies','MovieController@index');
//List Movie from ID
Route::get('movie/{id}','MovieController@show');

Route::get('sessions','SessionController@index');
Route::get('session/{id}','SessionController@show');

////Wont be needing these for the project but there if needed
//Route::post('cinema','CinemaController@store');
//Route::put('cinema','CinemaController@store');
//Route::delete('cinema/{id}','CinemaController@destroy');
