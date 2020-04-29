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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');
Route::get('register', 'RegisterController@index');
Route::get('login', 'LoginController@index')->name('login');
Route::get('dashboard', 'LoginController@dashboard')->middleware('auth');
Route::post('login', 'LoginController@authenticate');
Route::get('logout', 'LoginController@logout');
Route::post('register', 'RegisterController@store');
Route::get('profile/edit', 'ProfileController@edit');
Route::patch('profile/update/{id}', 'ProfileController@update');
Route::get('tweets/user/{id}', 'TweetController@show');
Route::post('follow/{user}', 'FollowController@follow');
Route::get('follow/{user}', 'FollowController@following');









