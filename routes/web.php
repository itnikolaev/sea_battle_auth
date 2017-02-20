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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>['web', 'auth']], function() { // сначала web потом auth
	
	// admin/
	Route::get('/', ['uses'=>'Admin\AdminController@show', 'as' => 'admin_index']);
	Route::get('/add/post', ['uses'=>'Admin\AdminPostController@create', 'as' => 'admin_add_post']);

});

Route::group(['prefix'=>'admin', 'middleware'=>['web', 'auth']], function() {
	
	Route::get('/home', ['uses'=>'HomeController@index','as'=>'home']);
	Route::get('/bot/add', ['uses'=>'BotController@create','as'=>'bot_create']);
	Route::post('/bot/add', ['uses'=>'BotController@getToken', 'as'=>'bot_token']);
	
});
