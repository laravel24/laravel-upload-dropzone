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

Route::get('game/list', 'GameController@viewGameList');
Route::post('game/save', 'GameController@saveGame');
Route::get('game/view/{id}', 'GameController@viewGamePics');
Route::get('game/delete/{id}', 'GameController@delete');
Route::post('image/do-upload', 'GameController@doImageUpload');

Route::get('/', function () {
    return view('users.login');
});

Route::post('user/do-login','Auth\AuthController@doLogin');
Route::get('user/logout',function(){
	Auth::logout();
	return redirect('/');
});
