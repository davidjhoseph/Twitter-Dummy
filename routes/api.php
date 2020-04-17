<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'RegisterController@store');
Route::post('login', 'LoginController@authenticate');
Route::get('tweets', 'TweetController@index');
Route::get('profile', 'ProfileController@index');
Route::get('tweets/user/11', 'TweetController@show');





