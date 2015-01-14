<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@ShowWelcome', 'as' => 'home'));

Route::group(array('before' => 'guest'), function()
	{
		Route::get('/user/create', array('uses' => 'UserController@getCreate', 'as' => 'getCreate'));
		Route::get('/user/login', array('uses' => 'UserController@getLogin', 'as' => 'getLogin'));

		Route::group(array('before' => 'csrf'), function()
		{
			Route::post('/user/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
			Route::post('/user/login', array('uses' => 'UserController@postLogin', 'as' => 'postLogin'));
		});
	});

Route::group(array('before' => 'auth'), function() 
{
	Route::get('/user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));
});

Route::group(array('prefix' => '/forum'), function()// prefiksējam groupu  kas atbildes par  /foruma sadaļu
{
	Route::get('/', array('uses' => 'ForumController@index', 'as' => 'forum-home'));// atbild  par  /form root
	Route::get('/category/{id}', array('uses' => 'ForumController@category', 'as' => 'forum-category'));//arbild par  categorijas sadalu
	Route::get('/thread/{id}', array('uses' => 'ForumController@thread', 'as' => 'forum-thread'));
	});