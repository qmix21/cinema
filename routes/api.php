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


//Register a new user to get access_token
Route::post('register','UserController@register');

//login with existing user to get access_token
Route::post('login','UserController@login');


//The below don't need authentication as they are just showing data
//List All Cinemas
Route::get('cinemas','CinemaController@index');

//List Cinema from ID or Name
Route::get('cinema/{id}','CinemaController@show');

//List All sessions happening for Cinema Name
Route::get('cinema/{name}/sessions','CinemaController@sessions');

//List All Sessions happening at Cinema for Movie
Route::get('cinema/{name}/{movie}','CinemaController@movie');

//List All Sessions happening at Cinema at time or date
Route::get("cinema/{name}/sessions/{date}",'CinemaController@sessionTime');

Route::get('cinema/{name}/{movie}/{date}','CinemaController@movieSession');


//List All Movies
Route::get('movies','MovieController@index');

//List Movie Title from ID
Route::get('movie/{id}','MovieController@show');

//List All sessions for Movie
Route::get('movie/{name}/sessions','MovieController@sessions');



//These need authentication as they are manipulating data, you will need to put Bearer *access_token* in the headers where *access_token* is your access token, found by logging in(http://localhost/api/login)
Route::group(['middleware' => 'auth:api'], function() 
{
Route::post('cinema','CinemaController@store');
//Route::put('cinema','CinemaController@store');
//Route::delete('cinema/{id}','CinemaController@destroy');

Route::post('movie','MovieController@store');

Route::post('session', 'SessionController@store');
});






//Not Sure if i needed these, but they will be here just incase.

//List all Sessions
//Route::get('sessions','SessionController@index');
//List Session by Id or Name
//Route::get('session/{id}','SessionController@show');
//List session by Date or Time
//Route::get('session/{time}','SessionController@time');

