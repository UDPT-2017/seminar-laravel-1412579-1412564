<?php

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

Route::get('/', ['as'=>'homepage','uses'=>'WelcomeController@Homepage']);


Route::group(['prefix'=>'admin'],function(){
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'HomepageController@dashboard']);

    Route::group(['prefix'=>'cate'],function(){
        //route get list
        Route::get('list', ['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
        //Route Add
        Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
        Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
        //Route Delete
        Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
        //Route 
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);


    });

    Route::group(['prefix'=>'product'],function(){
        Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'ProductController@getAdd']);
        Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
        Route::get('list', ['as' => 'admin.product.getList', 'uses' => 'ProductController@getList']);

        Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'ProductController@getDelete']);

        Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
        Route::get('delimg/{id}', ['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
     });

    Route::group(['prefix'=>'homepage'],function(){
        Route::get('list', ['as' => 'admin.homepage.getList', 'uses' => 'HomepageController@getList']);
        Route::get('edit/{id}', ['as' => 'admin.homepage.getEdit', 'uses' => 'HomepageController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.homepage.postEdit', 'uses' => 'HomepageController@postEdit']);
     });
});
