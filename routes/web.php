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

Route::get('/check/{username}', 'ApplicationController@checkPage')->name('application-username');

Route::get('/form/{username}', 'ApplicationController@formPage')->name('application-form');
Route::post('/form/{username}', 'ApplicationController@form');
Route::get('/success', 'ApplicationController@success')->name('application-success');

Auth::routes();

Route::get('/home', 'HomeController@index');
