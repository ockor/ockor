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

Route::get('/', 'DefaultController@index');



Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

//Route::get('login', 'Auth\UserController@login');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// tools
Route::resource('qrcode', 'QrcodeController');
Route::get('qrcode/create', 'QrcodeController@create');
Route::resource('fanyi', 'TranslateController');

Route::resource('gaoxiao', 'GaoxiaoController');

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'auth'], function()
{
    Route::get('/', 'IndexController@index');
    Route::resource('users', 'UserController');
    Route::resource('sites', 'SiteController');
    Route::resource('types', 'TypeController');
    Route::get('login', 'AuthController@getLogin');
    Route::get('register', 'AuthController@getRegister');
    Route::post('login', 'AuthController@postLogin');
    Route::post('register', 'AuthController@postRegister');
    Route::resource('admins', 'AdminController');
    Route::resource('article', 'ArticleController');
    Route::resource('gaoxiao', 'GaoxiaoController');
    Route::resource('fileupload', 'FileController');
});
