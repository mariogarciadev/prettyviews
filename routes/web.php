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
/** Albums Routes */
Route::get('/', 'PagesController@index');
Route::resource('albums', 'AlbumsController');

/** Albums Routes */
Route::get('/photos/{id}', 'PhotosController@show');
Route::get('/photos/create/{id}', 'PhotosController@create');
Route::post('/photos/store', 'PhotosController@store');
Route::delete('/photos/{id}', 'PhotosController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
