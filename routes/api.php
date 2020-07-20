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
    Route::post('/get_main_categories', 'categoryController@get_main_category');
    Route::post('/get_sub_categories/{cat_id}', 'categoryController@get_sub_category');
    Route::get('/get_products/{cat_id}', 'productsController@getProductList');
});
