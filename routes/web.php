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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/Profile/{name}', 'ProfileController@get_profile');

Route::get('/dashboard/{name}/assighment', 'AssighmentController@assighment');
Route::get('/add/assighment', 'AssighmentController@create');
Route::put('/assighment/completed/{completed}', 'AssighmentController@completed');
Route::post('/create/assighment', 'AssighmentController@store');
Route::delete('/assighment/delete/{delete}', 'AssighmentController@remove');

Route::post('/update', 'ProfileController@update_profile');

Route::resource('posts', 'PostController');

Route::post('/remove/{id}', 'ProfileController@remove');
Route::put('/assighment/completed/{completed}', 'AssighmentController@completed');

Auth::routes();

Route::get('/Profile', 'ProfileController@get_profile');

Route::get('/dashboard', 'DashboardController@index');
