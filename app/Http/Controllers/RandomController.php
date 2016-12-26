<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RandomController extends Controller
{
    public function index()
    {
    	$choosen_people = \DB::table('random')->select('NameChooser')->where('NameChooser', '!=', '')->get();

    	$choosen = [];
    	foreach ($choosen_people as $key => $value) {
    		array_push($choosen, $value->NameChooser);
    	}

    	$avai_peoples = \DB::table('random')->whereNotIn('id', $choosen)->get();


    	return view('random')->with([
    		'avai_peoples' => $avai_peoples,
    	]);
    }

    public function getmember(Request $request)
    {
    	$people = \DB::table('random')->where('confirm', 0)->get();

    	$ranvalue = [];
    	foreach ($people as $key => $value) {
    		$ranvalue[] = $value->id;
    	}

    	$random_person = $ranvalue[array_rand($ranvalue)];
    	
    	\DB::table('random')->where('id', $random_person)->update([
    		'confirm' => 1,
    		'NameChooser' => $request->chooser,
    	]);

    	$name = \DB::table('random')->select('Name')->where('id', $random_person)->first();

    	return response()->json([
    		'name' => $name,
    	]);
    }

    public function testvalidate()
    {
    	$access_token = '7xGXQTgIeNebLt9q7UtuY8TdPI6T8eAx1WxsHp5i38siySOMQrZ5wyc0A1xUFpLQ9s7DErBfFTdmeM3Gw73Clgxb4wN5uWpfGNgU68VkOFZMBu9ss2axWxrwMLfVR1WSBl7r02mgEKMO2pA59QVgKwdB04t89/1O/w1cDnyilFU=';

    	$url = 'https://api.line.me/v1/oauth/verify';

    	$headers = array('Authorization: Bearer ' . $access_token);

    	$ch = curl_init($url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	$result = curl_exec($ch);
    	curl_close($ch);
    	dd($result);
    	echo $result;
    }
}
