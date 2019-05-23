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

Route::get('/about', 'PagesController@about');

Route::get('/', 'PagesController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/main', 'AdminController@index');
Route::get('/users', 'UsersController@index');


Route::get('/posts/house', 'PostsController@showHouse');
Route::get('/posts/other', 'PostsController@showOther');
Route::get('/posts/apartment1', 'PostsController@showApartment1');
Route::get('/posts/apartment2', 'PostsController@showApartment2');
Route::get('/posts/apartment3', 'PostsController@showApartment3');
Route::get('/posts/area', 'PostsController@showArea');
Route::get('/posts/studio', 'PostsController@showStudio');
Route::get('/posts/garage', 'PostsController@showGarage');

Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');
Route::resource('types', 'TypesController');
Route::resource('cities', 'CitiesController');
Route::resource('abouts', 'AboutsController');


Route::auth();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/favourites', 'FavouritesController@index');
Route::get('/setRus', 'LocaleController@setRus');
Route::get('/setEng', 'LocaleController@setEng');

Route::post('/posts/{posts}/edit/removeImage', 'PostsController@removeImage');
Route::post('/posts/{posts}/like', 'PostsController@like');
