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

/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('welcome', 'PagesController@getWelcome');

Route::get('dash', 'PagesController@getIndex')->middleware('auth');


Route::get('signin', function() {
    return view('auth.signin');
});


//Authentication Routes
Route::get('auth/login', ['as' => 'login', 'uses' => 'PagesController@getSignin']);


//Registration Routes

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

//Authentication Routes
Route::get('auth/login', ['as' => 'login', 'uses' =>'Auth\LoginController@showLoginForm']);
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', ['as' => 'logout', 'uses' =>'Auth\LoginController@logout']);


//Genres
Route::resource('genres', 'GenreController', ['except' => ['create']]);

//Games
Route::resource('games', 'GamesController', ['except' => ['create']]);



//Profile Routes
Route::resource('profile', 'ProfileController', ['except' => ['create']]);


Route::get('game/{gameId}/like', ['as' => 'game.like', 'uses' => 'GamesController@getLike']);

//test routes
Route::resource('tests', 'TestController', ['except' => ['create']]);

//search routes
Route::get('search', [
    'uses'=> 'SearchController@getResults',
    'as'=> 'search.results',
]);

//view games routes
Route::resource('view', 'ViewgamesController', ['only' => ['index', 'show']]);

//owners routes
Route::resource('owners', 'OwnersController', ['only' => ['index', 'show']]);

Route::post('message/send', ['as' => 'message.send', 'uses' => 'MessagesController@send']);
Route::get('contact/{userId}', ['as' => 'contact.show', 'uses' => 'MessagesController@index']);
Route::get('test', ['as' => 'test', 'uses' => 'MessagesController@inbox']);
