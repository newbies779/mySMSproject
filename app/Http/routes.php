<?php

use App\Events\AdminRentApprove;
use App\Events\ItemCreate;
use App\RentListItem;
use App\Tracking;
use App\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Application Routesbower
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

// Route::get('/{category}/generateId', [
// 	'as' => 'item.generateId',
// 	'uses' => 'ItemController@generateId'
// 	]);

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

Route::get('/sendMail2/{id}','UserController@sendEmailNotifyAdminReturnDue');

Route::get('pusher', function () {
	$searchPattern = 'AUTOGEN_'.Carbon::now()->year;
	dd(Carbon::now()->format('Y') + 543 - 2500 . Carbon::now()->format('md'));
	// $users = User::all();
	// $arr_rent_to_mail = [
	// [],
	// [],
	// []
	// ];

	// foreach ($users as $user) {
	// 	$i = 0;
	// 	$triggerSendMail = false;
	// 	foreach ($user->rents as $rent) {
	//                     //check rentlist that have return date only.
	// 		if(!is_null($rent->return_date) && $rent->item->status == 'Borrowed'){
	//                         //find the date different
	// 			$datediff = strtotime($rent->return_date) - strtotime('now');
	// 			$datediff = ceil($datediff/(60*60*24));
	// 			var_dump((int)$datediff);
	// 			if((int)$datediff == 3 || (int)$datediff <=0){
	//                             //store who, days, itemname to array
	// 				$arr_rent_to_mail[$i++] = [
	// 				'user_id' => $user->id,
	// 				'days' => $datediff,
	// 				'itemname' => $rent->item->name
	// 				];
	// 				$triggerSendMail = true;
	// 				var_dump($arr_rent_to_mail);
	// 			}
	// 		}
	// 	}
	// 	if($triggerSendMail){
	// 		$description = '';

	// 		foreach ($arr_rent_to_mail as $arr_rent) {
	// 			$description .= "Your ". $arr_rent["itemname"]." have ".(int)$arr_rent["days"]." days left to be returned.\r\n";
	// 		}

	// 		dd($arr_rent_to_mail);
	// 		$user = User::findOrFail($arr_rent_to_mail[0]['user_id']);
	// 		Mail::send('emails.mailToNotifyUserReturnDue', ['user' => $user, 'description' => nl2br($description,false)], function($m) use ($user){
	// 			$m->from('Newbies780@gmail.com', 'Anupong Chuen-Im');

	// 			$m->to($user->email, $user->name)->subject('Your Notification');
	// 		});
	// 	}
	// }

	// return back();

// return view('pusher');
});
