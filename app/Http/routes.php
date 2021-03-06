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

// Frontend routes...
Route::get('/', 'FrontendController@render');
Route::get('about', 'FrontendController@about');
Route::get('investments', 'FrontendController@investments');

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
Route::group(['middleware' => 'auth', 'prefix' => 'dev'], function () {
    Route::get('asx', 'DevController@asx');
    Route::get('value', 'DevController@getValue');
    Route::get('id', 'DevController@id');
    Route::get('retro', 'DevController@retroVal');
    Route::get('send', 'DevController@send');
    Route::get('sendToCachet', 'DevController@sendToCachet');
    Route::get('apitime', 'DevController@apitime');
    Route::get('subs', 'DevController@subs');
    Route::get('apidelete', 'DevController@apidelete');
});

//Backend routes...
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'BackendController@render');
    Route::get('new-post', 'ArticleController@create');
    Route::post('new-post', 'ArticleController@store');
    Route::get('edit-post/{id}', 'ArticleController@edit');
    Route::post('edit-post/{id}', 'ArticleController@update');
});

//API routes...
Route::group(['prefix' => 'api'], function () {
    Route::get('/', function() {
        return view('api', ['name_catch' => 'API']);
    });
    Route::get('blog', 'APIController@blog5');
    Route::get('blog/latest', 'APIController@latestBlog');
    Route::get('inv/civ/latest', 'APIController@civ');
    Route::get('inv/civ', 'APIController@civ30');
    Route::get('subscribers', 'APIController@subs');
});

//Subscriber routes...
Route::resource('subscriber', 'SubscriberController');

//Blog routes...
Route::get('archive', 'ArticleController@index');
Route::get('{id}', 'ArticleController@show');
