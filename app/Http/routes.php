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

Route::get('/', function () {
	return view('welcome');
});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/review', 'ReviewController@index');

Route::get('/review/get', 'ReviewController@getData');

Route::patch('/rent/approve/{rent}', 'RentController@approveRent');

Route::patch('/return/approve/{rent}', 'ReturnController@approveReturn');

Route::patch('/rent/{item}', 'RentController@rentValidateandUpdate');

Route::patch('/return/{item}', 'ReturnController@returnValidateandUpdate');

Route::patch('/review/update', 'ReviewController@updateData');

Route::resource('item','ItemController');

