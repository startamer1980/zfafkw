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
    return view('front.home');
});

Auth::routes();

Route::group(['prefix'=>'/', 'namespace'=> 'Front'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/forgot_password', 'ForgotPasswordController@forgot_password')->name('password.reset');
});

