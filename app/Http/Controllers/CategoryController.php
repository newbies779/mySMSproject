<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('adminOnly');
	}

	public function validation(Request $request){
	    return [
	    	'name' => 'required'
	    ];
	}

    public function store(Request $request)
    {

    	$validator = Validator::make($request->all(), $this->validation($request));

    	if ($validator->fails()) {
    		return redirect()->route('item.index')
    		->withErrors($validator)
    		->withInput();
    	}

    	$category = new Category;
    	$res = $category->addNewCategory($request);

    	flash($res['message'],$res['status']);
    	return redirect()->route('item.index');
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), $this->validation($request));

        if ($validator->fails()) {
            return redirect()->route('item.index')
            ->withErrors($validator)
            ->withInput();
        }
        
        $res = $category->updateCategory($request);

        flash($res['message'],$res['status']);
        return redirect()->route('item.index');
    }
}
