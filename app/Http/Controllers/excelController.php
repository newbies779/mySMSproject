<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Item;
use App\User;
use DB;
use Illuminate\Http\Request;

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
		$items = DB::table('items')
		->leftjoin('users', 'items.assignee_id', '=', 'users.id')
		->select('items.item_id', 'items.custom_id', 'items.name as itemName', 'items.status', 'items.location', 'users.name as UserName')
		->get();

		\Excel::create('Item List Report', function ($excel) use ($items) {
			$excel->sheet('ItemList', function ($sheet) use ($items) {
                // $sheet->loadView('excel.itemListTable',compact('items'));
				$data = array(
					"#" => '0',
					"item_id" => '0',
					"custom_id" => '0',
					"ItemName" => '0',
					"status" => '0',
					"location" => '0',
					"UserName" => '0'
					);

				$allData = [];
				$i = 1;

				foreach ($items as $item) {
					$data["#"] = $i++;
					$data["item_id"] = $item->item_id;
					$data["custom_id"] = $item->custom_id;
					$data["ItemName"] = $item->itemName;
					$data["status"] = $item->status;
					$data["location"] = $item->location;
					if ($item->UserName != null) {
						$data["UserName"] = $item->UserName;
					} else {
						$data["UserName"] = 'No Assignee';
					}

					array_push($allData, $data);
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

		})->export('xls');
		
		return back();
	}

	public function import(Request $request)
	{
		if ($request->hasFile('import_file')) {
			$file = $request->file('import_file');
			$path = $file->path();
			\Excel::load($path, function ($reader) {
				$celCol = $reader->get()->values();

				foreach ($celCol as $value) {
					$userID = User::select('id')
					->where('name', $value->username)
					->first();
					$item = new Item;
					if (!is_null($userID)) {
						$item->item_id = $value->item_id;
						$item->custom_id = $value->custom_id;
						$item->name = $value->itemname;
						$item->status = $value->status;
						$item->location = $value->location;
						$item->assignee_id = $value->assignee_id;
						$item->category_id = 10;
						$item->save();
					} else {
						$item->item_id = $value->item_id;
						$item->custom_id = $value->custom_id;
						$item->name = $value->itemname;
						$item->status = $value->status;
						$item->location = $value->location;
						$item->assignee_id = 1;
						$item->category_id = 10;
						$item->save();
					}
				}
			});
		}

		return back();
	}
}
