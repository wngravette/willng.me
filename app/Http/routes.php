<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@render');

// Authentication routes...
Route::get('login', function()
{
    return Redirect::to('auth/login');
});

Route::get('logout', function()
{
    return Redirect::to('auth/logout');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Dev routes...
Route::get('dev/asx', 'DevController@asx');
Route::get('dev/value', 'DevController@getValue');
Route::get('dev/id', 'DevController@id');
Route::get('dev/retro', 'DevController@retroVal');

//Backend routes...
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'BackendController@render');
    Route::get('dashboard/new-post', 'ArticleController@create');
    Route::post('dashboard/new-post', 'ArticleController@store');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('down', 'APIController@down');
});

//Blog routes...
Route::get('{id}', 'ArticleController@show');
