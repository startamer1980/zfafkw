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
define('PAGINATION_API_COUNT', 100);
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// test
Route::group(['middleware'=>'api', 'namespace'=> 'Api'], function(){

    Route::post('/upload_file', 'uploadController@uploadFile');
    Route::post('/get_main_categories', 'categoryController@get_main_category');
    Route::post('/get_sub_categories/{cat_id}', 'categoryController@get_sub_category');
    Route::get('/get_products/{cat_id}', 'productsController@getProductList');
    Route::group(['prefix'=>'product'], function (){
        Route::get('/increase_views/{product_id}', 'productsController@increaseViews');
        Route::POST('/product_add', 'productsController@store');
    });
    Route::group(['prefix'=>'qabael'], function (){
        Route::get('/categories', 'qabaelCategoryApiController@list');
        Route::get('/list/{cat_id}/{type_cat_id}', 'productsController@getProductQabaelList');
    });
    Route::group(['prefix'=>'users'], function (){
        Route::post('/add', 'UsersController@add');
        Route::post('/login', 'UsersController@login');
        Route::group(['middleware' => 'checkUserToken:user_api'], function(){

        });
        Route::post('/update', 'UsersController@update');
        Route::post('/change_password', 'UsersController@change_password');
        Route::post('/change_avatar', 'UsersController@change_avatar');
    });
});
