<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Item;
use App\Tracking;
use App\User;
use DB;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Carbon\Carbon;

class excelController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('adminOnly');
	}

	public function importPage()
	{
		return view('excelImport');
	}

	public function export()
	{
		$categories = Category::all();

		$items = DB::table('items')
		->leftjoin('users', 'items.assignee_id', '=', 'users.id')
		->select('items.item_id', 'items.custom_id', 'items.name as itemName', 'items.status', 'items.location', 'users.name as UserName', 'items.category_id', 'items.note')
		->orderBy('items.category_id','asc')
		->get();

		$category_name = DB::table('categories')->select('name')->get();
		array_unshift($category_name, 'dummy');
		if(empty($items))return back()->withErrors(['Error Message', 'No Data to export']);

		\Excel::create('Item List Report', function ($excel) use ($items, $categories, $category_name) {
			foreach ($categories as $category) {
				$excel->sheet($category->name, function ($sheet) use ($items, $category, $category_name) {
            	    // $sheet->loadView('excel.itemListTable',compact('items'));
					$data = array(
						"#" => '0',
						"item_id" => '0',
						"custom_id" => '0',
						"ItemName" => '0',
						"status" => '0',
						"location" => '0',
						"category_name" => '0',
						"UserName" => '0'
						);

					$allData = [];
					$i = 1;

					foreach ($items as $item) {
						if($item->category_id == $category->id){
							$data["#"] = $i++;
							$data["item_id"] = $item->item_id;
							$data["custom_id"] = $item->custom_id;
							$data["ItemName"] = $item->itemName;
							$data["status"] = $item->status;
							$data["location"] = $item->location;
							$data["category_name"] = $category_name[$item->category_id]->name;
							if ($item->UserName != null) {
								$data["UserName"] = $item->UserName;
							} else {
								$data["UserName"] = 'No Assignee';
							}
							$data["note"] = $item->note;
							array_push($allData, $data);
						}
					}

					$sheet->fromArray($allData, null, 'A1', false, true);

					$sheet->row(1, function ($row) {

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
			}
		})->export('xls');
		
		return back();
	}

	public function import(Request $request)
	{
		if ($request->hasFile('import_file')) {
			$file = $request->file('import_file');
			$path = $file->path();
			\Excel::load($path, function ($reader) {
				
				// $sheets = $reader->get(array('Subject','ID','Address','Assignee'))->values();
				$sheets = $reader->get()->values();

				

				foreach ($sheets as $sheet) {
					$firstrow = $sheet->first()->toArray();
					
					if(!array_key_exists('subject', $firstrow)){
						return back()->withErrors(['Error Message', "No Subject Column in " . $sheet->gettitle()]);
					}
					if(!array_key_exists('id', $firstrow)){
						return back()->withErrors(['Error Message', "No ID Column in " . $sheet->gettitle()]);
					} 
					if(!array_key_exists('address', $firstrow)){
						return back()->withErrors(['Error Message', "No Address Column in " . $sheet->gettitle()]);
					}
					if(!array_key_exists('assignee', $firstrow)){
						return back()->withErrors(['Error Message', "No Assignee Column in " . $sheet->gettitle()]);
					}

					
					
					$faker = Faker::create();
					DB::beginTransaction();
					try {
						
						//create category according to excel files
						$category = Category::where('name', $sheet->gettitle())->first();

						//if category already exists
						if($category === null){
							$category = new Category;
							$category->name = $sheet->gettitle();

							//only Borrow-Return are rentable
							if($sheet->gettitle() == "Borrow-Return") $category->rentable = 1;
							else $category->rentable = 0;
							$category->save();
						}

						foreach ($sheet as $row) {

							//create item
							$item = new Item;
							
							$userID = User::select('id')
							->where('name', $row->assignee)
							->first();
							
							$tracking = null;

							if(!is_null($userID)) $userID = $userID->id;

							if(is_null($row->id)){
								$searchPattern = 'AUTOGEN_'.Carbon::now()->year; //AUTOGEN_2016
								if(Tracking::where('item_id', $searchPattern)->exists()){
									$track = Tracking::where('item_id', $searchPattern)->first();
									$item->item_id 		= 	$track->tracking;
									$item->custom_id 	= 	$item->item_id;
									$track->tracking = $track->tracking + 1;
									$track->save();
								}else{
									//Add new tracking
									$track = new Tracking;
									$track->item_id = $searchPattern;
									$track->tracking = Carbon::now()->format('Y') + 543 - 2500 . Carbon::now()->format('md').'000'; //591021000
									$track->save();
									$item->item_id 		= 	$track->tracking;
									$item->custom_id 	= 	$item->item_id;

									//Update Tracking
									$track->tracking = $track->tracking + 1;
									$track->save();
								}
							}else{
								if (!Tracking::where('item_id', '=', $row->id)->exists()) {
									DB::table('tracking')->insert(['item_id' => $row->id, 'tracking' => '01']);		
									$item->item_id 		= 	$row->id;
									$item->custom_id 	= 	$row->id;							
									
								}else{
									$tracking = Tracking::where('item_id', '=', $row->id)->first();
									$last_tracking = $tracking->tracking;
									$item->item_id 		= 	$row->id;
									$item->custom_id 	= 	$row->id.'_'.$last_tracking;

									if((int)$last_tracking == 1){
										$update_item = Item::where('custom_id', $row->id)->first();
										$update_item->custom_id = $update_item->custom_id.'_00';
										$update_item->save();
									}
									//update tracking No
									if((int)$last_tracking<9){
										$tracking->tracking = '0'.strval(intval($tracking->tracking)+1);
									}else{
										$tracking->tracking = strval(intval($tracking->tracking)+1);
									}
									$tracking->save();
								}
							}
							
							$item->name 		= 	$row->subject;
							$item->status 		= 	"Available";
							$item->location 	= 	$row->address;
							if(!is_null($userID)){
								$item->assignee_id 	= 	$userID;
							}else{
								$item->note 		= 	$row->note;
							}
							$item->category_id 	= 	$category->id;
							$item->save();

						}

						DB::commit();
					} catch (exception $e) {
						DB::rollback();
					}
				}


				// foreach ($celCol as $value) {
					// $userID = User::select('id')
					// ->where('name', $value->username)
					// ->first();
					// $userID = $userID->id;
				// 	$item = new Item;
				// 	if (!is_null($userID)) {
				// 		$item->item_id = $value->item_id;
				// 		$item->custom_id = $value->custom_id;
				// 		$item->name = $value->itemname;
				// 		$item->status = $value->status;
				// 		$item->location = $value->location;
				// 		$item->assignee_id = $userID;
				// 		$item->category_id = 10;
				// 		$item->save();
				// 	} else {
				// 		$item->item_id = $value->item_id;
				// 		$item->custom_id = $value->custom_id;
				// 		$item->name = $value->itemname;
				// 		$item->status = $value->status;
				// 		$item->location = $value->location;
				// 		$item->assignee_id = 1;
				// 		$item->category_id = 10;
				// 		$item->save();
				// 	}
				// }
			});
}else{
	return back()->withErrors(['Error Message', 'No File to import']);
}

return back();
}
}
