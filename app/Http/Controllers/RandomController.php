<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RandomController extends Controller
{
    public function index()
    {
    	$choosen_people = \DB::table('random')->select('NameChooser')->where('NameChooser', '!=', '')->get();

    	return view('random')->with([
    		'choosen_peoples' => $choosen_people,
    	]);
    }

    public function getmember()
    {
    	$people = \DB::table('random')->where('confirm', 0)->get();

    	dd($people);
    }
}
