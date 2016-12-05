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

Route::get('/', ['as' => 'home', 'uses' => 'Boards\BoardController@index']);

Route::group(['prefix' => 'board', 'as' => 'board.', 'namespace' => 'Boards'], function() {
	Route::get('{slug}/show', ['as' => 'show', 'uses' => 'BoardController@show']);
});

Route::group(['prefix' => 'board/topic', 'as' => 'topic.', 'namespace' => 'Boards'], function() {
	Route::get('{slug}/show', ['as' => 'show', 'uses' => 'TopicController@show']);
});


Route::group(['prefix' => 'social', 'as' => 'social.', 'namespace' => 'Users'], function() {
	Route::get('{provider}', ['as' => 'redirect', 'uses' => 'SocialController@redirectToProvider']);
	Route::get('{provider}/callback', ['as' => 'callback', 'uses' => 'SocialController@handleProviderCallback']);
	Route::post('/', ['as' => 'create', 'uses' => 'SocialController@create']);
});

Route::group(['prefix' => 'register', 'as' => 'register.', 'namespace' => 'Auth'], function() {
	Route::get('/', ['as' => 'create', 'uses' => 'RegisterController@create']);
	Route::post('/', ['as' => 'store', 'uses' => 'RegisterController@store']);
});

Route::group(['as' => 'auth.', 'namespace' => 'Auth'], function() {
	Route::get('login', ['as' => 'create', 'uses' => 'LoginController@create']);
	Route::post('login', ['as' => 'store', 'uses' => 'LoginController@store']);
	Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@destroy']);
});

Route::group(['prefix' => 'api/v1', 'namespace' => 'API'], function() {
	Route::post('votes/count', 'VotesController@show');
	Route::post('votes', 'VotesController@store');
});