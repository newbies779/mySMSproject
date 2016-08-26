<?php

use App\Events\AdminRentApprove;
use Illuminate\Foundation\Auth\User;
use App\Events\ItemCreate;
use Vinkla\Pusher\Facades\Pusher;

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

Route::get('/history', 'HistoryController@index');

Route::get('/review/get', 'ReviewController@getData');

Route::patch('/rent/approve/{rent}', 'RentController@approveRent');

Route::patch('/return/approve/{rent}', 'ReturnController@approveReturn');

Route::patch('/rent/{item}', 'RentController@rentValidateandUpdate');

Route::patch('/return/{item}', 'ReturnController@returnValidateandUpdate');

Route::patch('/review/update', 'ReviewController@updateData');

Route::resource('item','ItemController');

Route::post('/category','CategoryController@store');


Route::get('broadcast', function(){
	//event(new AdminRentApprove('123'));
	//event(new ItemCreate('Available','2','200'));
	// Pusher::trigger('test1', 'testEvent', ['message' => '555']);
	return "done";
});



Route::get('pusher',function(){
	return view('pusher');
});

