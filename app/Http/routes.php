<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/', 'CatalogController@index');
    Route::get('/product/{id}', 'CatalogController@show');
    Route::get('/category/{id}', 'CatalogController@inCategory');
    Route::get('/basket', 'BasketController@index');
    Route::get('/add', 'BasketController@addToBasket');
    Route::get('/remove/{id}', 'BasketController@removeFromBasket');
    Route::get('/quantity', 'BasketController@changeQuantity');

});