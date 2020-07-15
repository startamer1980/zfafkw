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
define('PAGINATION_COUNT', 10);
define('google_api_key_for_map', 'AIzaSyCx1YJ-V1JYyjJOFZEgUPOY_fNLyUVwBjA');

Route::group(['namespace' => 'Admin','middleware' => 'auth:admin'], function(){

    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/logout', 'LoginController@logout') -> name('admin.logout');


    ########################### Begin Admins Route ######################################
    Route::group(['prefix' => 'admins'], function (){
        Route::get('/',             'AdminsController@index')    -> name('admin.admins');
        Route::get('/create',       'AdminsController@create')   -> name('admin.admins.create');
        Route::post('/store',       'AdminsController@store')    -> name('admin.admins.store');
        Route::get('/edit/{id}',    'AdminsController@edit')     -> name('admin.admins.edit');
        Route::post('/update/{id}', 'AdminsController@update')   -> name('admin.admins.update');
        Route::get('/delete/{id}',  'AdminsController@destroy')  -> name('admin.admins.delete');
    });
    ########################### End Admins Route ######################################
    ########################### Begin Main Category Route ######################################
    Route::group(['prefix' => 'category'], function (){
        Route::get('/',                 'CategoryController@index')     -> name('admin.category');
        Route::get('/create',           'CategoryController@create')    -> name('admin.category.create');
        Route::post('/store',           'CategoryController@store')     -> name('admin.category.store');
        Route::get('/edit/{id}',        'CategoryController@edit')      -> name('admin.category.edit');
        Route::post('/update/{id}',     'CategoryController@update')    -> name('admin.category.update');
        Route::get('/delete/{id}',      'CategoryController@destroy')   -> name('admin.category.delete');

        ########################### Begin sub Category Route ######################################

        Route::group(['prefix'=>'sub_category'], function (){
            Route::get('/{id_cat}',                 'CategoryController@index_sub_category')   -> name('admin.category.sub_category');
            Route::get('/{id_cat}/create',          'CategoryController@create_sub_category')  -> name('admin.category.sub_category.create');
            Route::post('/{id_cat}/store',          'CategoryController@store_sub_category')   -> name('admin.category.sub_category.store');
            Route::get('/{id_cat}/edit/{id}',       'CategoryController@edit_sub_category')    -> name('admin.category.sub_category.edit');
            Route::post('/{id_cat}/update/{id}',    'CategoryController@update_sub_category')  -> name('admin.category.sub_category.update');
            Route::get('/{id_cat}/delete/{id}',     'CategoryController@destroy_sub_category') -> name('admin.category.sub_category.delete');
        });
        ########################### End sub Category Route ######################################

    });
    ########################### End Main Category Route ######################################


    ########################### Begin Wedding_halls Route ######################################

    Route::group(['prefix' => 'wedding_halls'], function (){
        Route::get('/{cat_id}', 'WeddingHallsController@index') -> name('admin.wedding_halls');
        Route::get('/{cat_id}/create', 'WeddingHallsController@create') -> name('admin.wedding_halls.create');
        Route::post('/{cat_id}/store', 'WeddingHallsController@store') -> name('admin.wedding_halls.store');
        Route::get('/{cat_id}/edit/{id}', 'WeddingHallsController@edit') -> name('admin.wedding_halls.edit');
        Route::post('/{cat_id}/update/{id}', 'WeddingHallsController@update') -> name('admin.wedding_halls.update');
        Route::get('/{cat_id}/delete/{id}', 'WeddingHallsController@destroy') -> name('admin.wedding_halls.delete');
    });
    ########################### End Wedding_halls Route ######################################



    ########################### Begin Qabael Route ######################################

    Route::group(['prefix' => 'cards'], function (){

        Route::get('/', 'CardsController@cat') -> name('admin.cards.cat');

        ###################### Begin Form1 Qabael Route ####################################
        Route::get('/list/{type_id}', 'CardsController@form1index') -> name('admin.cards.form1.index');
        Route::get('/create/{type_id}', 'CardsController@form1create') -> name('admin.cards.form1.create');
        Route::post('/store/{type_id}', 'CardsController@form1store') -> name('admin.cards.form1.store');
        Route::get('/edit/{type_id}/{id}', 'CardsController@form1edit') -> name('admin.cards.form1.edit');
        Route::post('/update/{type_id}/{id}', 'CardsController@form1update') -> name('admin.cards.form1.update');
        Route::get('/delete/{type_id}/{id}', 'CardsController@form1destroy') -> name('admin.cards.form1.delete');
        ###################### End Form1 Qabael Route ####################################

        ###################### Begin Qabael category Route ####################################
        Route::group(['prefix' => 'category'], function(){
            Route::get('/{cat_type}/list', 'QabaelCategoryController@index') -> name('admin.qabael.category');
            Route::get('/{cat_type}/create', 'QabaelCategoryController@create') -> name('admin.qabael.category.create');
            Route::post('/{cat_type}/store', 'QabaelCategoryController@store') -> name('admin.qabael.category.store');
            Route::get('/{cat_type}/edit/{id}', 'QabaelCategoryController@edit') -> name('admin.qabael.category.edit');
            Route::post('/{cat_type}/update/{id}', 'QabaelCategoryController@update') -> name('admin.qabael.category.update');
            Route::get('/{cat_type}/delete/{id}', 'QabaelCategoryController@destroy') -> name('admin.qabael.category.delete');

        });
        ###################### End Qabael category Route ####################################
    });
    ########################### End Qabael Route ######################################



    ########################### Begin Qabael Route ######################################

    Route::group(['prefix' => 'qabael'], function (){

        Route::get('/{qa_id}', 'QabaelController@cat') -> name('admin.qabael.cat');

        ###################### Begin Form1 Qabael Route ####################################
        Route::get('/{qa_id}/list/{type_id}', 'QabaelController@form1index') -> name('admin.qabael.form1.index');
        Route::get('/{qa_id}/create/{type_id}', 'QabaelController@form1create') -> name('admin.qabael.form1.create');
        Route::post('/{qa_id}/store/{type_id}', 'QabaelController@form1store') -> name('admin.qabael.form1.store');
        Route::get('/{qa_id}/edit/{type_id}/{id}', 'QabaelController@form1edit') -> name('admin.qabael.form1.edit');
        Route::post('/{qa_id}/update/{type_id}/{id}', 'QabaelController@form1update') -> name('admin.qabael.form1.update');
        Route::get('/{qa_id}/delete/{type_id}/{id}', 'QabaelController@form1destroy') -> name('admin.qabael.form1.delete');
        ###################### End Form1 Qabael Route ####################################

        ###################### Begin Qabael category Route ####################################
        Route::group(['prefix' => 'category'], function(){
            Route::get('/{cat_type}/list', 'QabaelCategoryController@index') -> name('admin.qabael.category');
            Route::get('/{cat_type}/create', 'QabaelCategoryController@create') -> name('admin.qabael.category.create');
            Route::post('/{cat_type}/store', 'QabaelCategoryController@store') -> name('admin.qabael.category.store');
            Route::get('/{cat_type}/edit/{id}', 'QabaelCategoryController@edit') -> name('admin.qabael.category.edit');
            Route::post('/{cat_type}/update/{id}', 'QabaelCategoryController@update') -> name('admin.qabael.category.update');
            Route::get('/{cat_type}/delete/{id}', 'QabaelCategoryController@destroy') -> name('admin.qabael.category.delete');

        });
        ###################### End Qabael category Route ####################################
    });
    ########################### End Qabael Route ######################################


});


Route::group(['namespace' => 'Admin','middleware' => 'guest:admin'], function(){

    Route::get('login',     'LoginController@getLogin') ->name('get.admin.login');
    Route::post('login',    'LoginController@Login')    ->name('admin.login');
});


Route::get("test_query",function (){
   return test_functions();
});
