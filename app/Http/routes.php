<?php

use App\Events\AdminRentApprove;
use App\Events\ItemCreate;
use Maatwebsite\Excel\Facades\Excel;
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
Route::get('/', 'LandingController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/review', 'ReviewController@index');

Route::get('/history', 'HistoryController@index');

Route::get('/review/get', 'ReviewController@getData');

Route::patch('/rent/approve/{rent}', 'RentController@approveRent');

Route::patch('/return/approve/{rent}', 'ReturnController@approveReturn');

Route::patch('/rent/{item}', 'RentController@rentValidateandUpdate');

Route::delete('/rent/{item}', 'RentController@destroy');

Route::patch('/return/{item}', 'ReturnController@returnValidateandUpdate');

Route::patch('/review/update', 'ReviewController@updateData');

Route::resource('item', 'ItemController');

Route::post('/category', 'CategoryController@store');

Route::patch('/category/{category}', 'CategoryController@update');


Route::get('broadcast', function () {
    //event(new AdminRentApprove('123'));
    //event(new ItemCreate('Available','2','200'));
    // Pusher::trigger('test1', 'testEvent', ['message' => '555']);
    // 
    
});


Route::post('import','excelController@import');

Route::get('export', 'excelController@export');

Route::get('importPage', 'excelController@importPage');

Route::get('/sendMail/{id}','UserController@sendEmailNotifyUserReturnDue');

Route::get('pusher', function () {
    return view('pusher');
});
