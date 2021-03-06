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

Route::get('/home', 'HomeController@index');

Route::post('/add', 'HomeController@insert_post');

Route::get('/notes/{id}/delete', 'HomeController@delete_post');

Route::get('/notes/{id}/edit','HomeController@edit');
Route::post('/edit_post/{id}','HomeController@update');

Route::get('/notes/{id}','HomeController@show_details');

Route::get('/{id}/profile','HomeController@profile_data');

