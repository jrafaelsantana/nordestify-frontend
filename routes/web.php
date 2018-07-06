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

Route::get('user/{id}', 'UserController@getProfile')->name('user');


//API
Route::get('api', 'ApiController@index')->name('api');
Route::get('api/artistas', 'ApiController@getArtistsList')->name('apiArtistas');
Route::get('api/artistas/{id}', 'ApiController@getArtistInfo')->name('apiArtista');
Route::get('api/musicas', 'ApiController@getMusicsList')->name('apiMusicas');
Route::get('api/musicas/{id}', 'ApiController@getMusicInfo')->name('apiMusica');