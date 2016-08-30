<?php

use App\Events\AdminRentApprove;
use App\Events\ItemCreate;
use App\Item;
use App\Logs;
use App\RentListItem;
use Illuminate\Foundation\Auth\User;
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

Route::patch('/category/{category}','CategoryController@update');


Route::get('broadcast', function(){
	//event(new AdminRentApprove('123'));
	//event(new ItemCreate('Available','2','200'));
	// Pusher::trigger('test1', 'testEvent', ['message' => '555']);
	// 
	$items = \DB::table('items')
	->leftjoin('users','items.assignee_id','=','users.id')
	->select('items.id','items.custom_id','items.name as itemName','items.status','items.location','users.name as UserName')
	->get();

	Excel::create('Item List Report', function($excel) use($items) {
		$excel->sheet('ItemList', function($sheet) use($items) {
			// $sheet->loadView('excel.itemListTable',compact('items'));
			$data = array(
				"id" => '0',
				"custom_id" => '0',
				"ItemName" => '0',
				"status" => '0',
				"location" => '0',
				"UserName" => '0'
				);

			$allData = [];

			foreach ($items as $item) {
				
				$data["id"] = $item->id;
				$data["custom_id"] = $item->custom_id;
				$data["ItemName"] = $item->itemName;
				$data["status"] = $item->status;
				$data["location"] = $item->location;
				if($item->UserName != null){
					$data["UserName"] = $item->UserName;
				}else{
					$data["UserName"] = 'No Assignee';
				}
				
				array_push($allData, $data);
			}

			// dd($allData);

			$sheet->fromArray($allData,null,'A1',false,true);

			$sheet->row(1, function($row) {

			// call cell manipulation methods
				$row->setFont(array(
					'family'     => 'Calibri',
					'size'       => '11',
					'bold'       =>  true
					)
				);
			});

			// $sheet->setWidth('A',3.11);
		});

		// $excel->getActiveSheet()->getColumnDimension('B')->setWidth(100);

	})->export('xls');
});



Route::get('pusher',function(){
	return view('pusher');
});

