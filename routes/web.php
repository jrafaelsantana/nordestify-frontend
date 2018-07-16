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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_profile')->name('updateProfile');
Route::get('musics', 'UserController@musics')->name('musics');
Route::get('results', 'UserController@getResultados')->name('results');

Route::get('user/{id}', 'UserController@getProfile')->name('user');


//API
Route::get('api', 'ApiController@index')->name('api');
Route::get('api/users/{id}', 'ApiController@getUserInfo')->name('apiUser');
Route::get('api/artists', 'ApiController@getArtistsList')->name('apiArtistas');
Route::get('api/artists/{id}', 'ApiController@getArtistInfo')->name('apiArtista');
Route::get('api/musics', 'ApiController@getMusicsList')->name('apiMusicas');
Route::get('api/musics/{id}', 'ApiController@getMusicInfo')->name('apiMusica');

Route::get('api/musics/search/{termo}', 'ApiController@search')->name('apiSearch');
Route::get('api/allmusics', 'ApiController@getAllMusics')->name('apiAllMusics');

Route::get('api/musics/reviews/{avaliacao}/{musica}', 'ApiController@setReview')->name('apiReview');