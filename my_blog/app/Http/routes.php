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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','WelcomeController@index');

Route::get('contact', 'WelcomeController@contact');

Route::get('about', 'PagesController@about');
Route::resource('users', 'UserController');
Route::get('/register', 'UserController@showUserRegistration');
Route::post('/register', 'UserController@saveUser');
//Route::get('articles','ArticlesController@index');

//Route::get('articles/create','ArticlesController@create');

//Route::get('articles/{id}','ArticlesController@show');

//Route::post('articles','ArticlesController@store');
//Route::get('articles/{id}/edit','ArticlesController@edit');
Route::resource('articles','ArticlesController');
/*Route::resource('articles',function(){
	
});*/

Route::controllers(['auth' => 'Auth\AuthController','password' => 'Auth\PasswordController']);
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('foo',['middleware' => 'manager',function()
{
  return 'This page is allowed to view by managers';
}]);