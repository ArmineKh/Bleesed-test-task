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
});


Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@store');

Route::get('/login/facebook','LoginController@socialLogin');
Route::get('/login/facebook/callback','LoginController@handleProviderCallback');

Route::post('/logout', 'LoginController@logout');
Route::get('/home', function () {
    return view('customauth.home');
});

Route::get('/forget-password', 'ForgotPasswordController@getEmail');
Route::post('/forget-password', 'ForgotPasswordController@postEmail');

Route::get('/{token}/reset-password', 'ResetPasswordController@getPassword');
Route::post('/reset-password', 'ResetPasswordController@updatePassword');


