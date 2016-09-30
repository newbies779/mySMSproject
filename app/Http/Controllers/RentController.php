<?php

namespace App\Http\Controllers;

use App\Events\RentApprove;
use App\Events\RentItem;
use App\Http\Requests;
use App\Item;
use App\RentListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
	private $itemStatus = "";

	public function validation($request){
		return [
		   	'RentDate' => 'date|required',
		   	'ReturnDate' => 'date|after:RentDate'
		];
	}

	public function rentValidateandUpdate(Request $request, item $item){

		$validator = Validator::make($request->all(), $this->validation($request));

		if ($validator->fails()) {
			return redirect('/home')
			->withErrors($validator)
			->withInput();
		}

		$this->itemStatus = 'Reserved';

		$returnStatus = $item->updateItem($item,$request,$this->itemStatus);
		if($returnStatus['status'] == "success"){
			flash($returnStatus['message'],'info');
			event(new RentItem($item->status,Auth::user()->id,$item->id));
			return redirect('/home');
		}

		flash($returnStatus['message'],'warning');
		return redirect('/home');
	}

	public function approveRent(RentListItem $rent)
	{
		$this->itemStatus = 'Borrowed';
		$returnStatus = $rent->setRentApprove($rent,$this->itemStatus);

		$item = new item;
		$item = $item->getItemObject($rent->item_id);
		
		if($returnStatus['status'] == "success"){
			flash($returnStatus['message'],'info');
			event(new RentApprove($item->status,Auth::user()->id,$item->id));
			return redirect('/home');
		}

		flash($returnStatus['message'],'warning');
		return redirect('/home');

	}

	public function destroy(Request $request, $rentId)
	{	
		$rent = RentListItem::findorfail($rentId);
		\DB::table('rent_list_items')->where('id',$rent->id)->delete();
		
		$item = $rent->item;
		if($item->status == "Reserved"){
			$item->status = "Available";
			$item->save();
			flash("Delete Rent information completed". 'info');
			event(new RentApprove($item->status,Auth::user()->id,$item->id));
			return back();
		}else{
			flash("Item's status is not reserved. Cannot delete". 'warning');
			return back();
		}
	}

	
}
