<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\item;
use App\RentListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReturnController extends Controller
{
	private $itemStatus = "";

	public function validation($request){
		return [
		   	'ReturnDate' => 'date|required'
		];
	}

    public function returnValidateandUpdate(Request $request, item $item){

    	$validator = Validator::make($request->all(), $this->validation($request));

    	if ($validator->fails()) {
    		return redirect('/home')
    		->withErrors($validator)
    		->withInput();
    	}

    	$this->itemStatus = 'ReturnPending';

    	$returnStatus = $item->updateItem($item,$request,$this->itemStatus);
    	
    	if($returnStatus['status'] == "success"){
    		flash($returnStatus['message'],'info');
    		return redirect('/home');
    	}

    	flash($returnStatus['message'],'warning');
    	return redirect('/home');
    }

    public function approveReturn(RentListItem $rent)
    {
        $this->itemStatus = 'Available';
        $returnStatus = $rent->setReturnApprove($rent,$this->itemStatus);

        if($returnStatus['status'] == "success"){
            flash($returnStatus['message'],'info');
            return redirect('/home');
        }

        flash($returnStatus['message'],'warning');
        return redirect('/home');
    }
}
