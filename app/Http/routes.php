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

Route::get('/', 'FrontendController@render');

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
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

//Dev routes...
Route::get('dev/asx', 'DevController@asx');
Route::get('dev/value', 'DevController@getValue');
Route::get('dev/id', 'DevController@id');
Route::get('dev/retro', 'DevController@retroVal');
Route::get('dev/send', 'DevController@send');
Route::get('dev/sendToCachet', 'DevController@sendToCachet');
Route::get('dev/apitime', 'DevController@apitime');

//Backend routes...
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'BackendController@render');
    Route::get('new-post', 'ArticleController@create');
    Route::post('new-post', 'ArticleController@store');
    Route::get('edit-post/{id}', 'ArticleController@edit');
    Route::post('edit-post/{id}', 'ArticleController@update');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/', function() {
        return view('api', ['name_catch' => 'API']);
    });
    Route::get('blog', 'APIController@blog5');
    Route::get('blog/latest', 'APIController@latestBlog');
    Route::get('inv/civ/latest', 'APIController@civ');
    Route::get('inv/civ', 'APIController@civ30');
});

//General app routes...
Route::get('about', 'FrontendController@about');
Route::get('investments', 'FrontendController@investments');

//Blog routes...
Route::get('{id}', 'ArticleController@show');
