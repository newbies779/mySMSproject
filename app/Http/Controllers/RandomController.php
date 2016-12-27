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
    	$people = \DB::table('random')->where('confirm', 0)->where('id', '!=', $request->chooser)->get();

    	$ranvalue = [];
    	foreach ($people as $key => $value) {
    		$ranvalue[] = $value->id;
    	}

    	$random_person = $ranvalue[array_rand($ranvalue)];
    	
    	\DB::table('random')->where('id', $random_person)->update([
    		'confirm' => 1,
    		'NameChooser' => $request->chooser,
    	]);

        //randomed name
    	$name = \DB::table('random')->select('Name')->where('id', $random_person)->first();

     //    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('7xGXQTgIeNebLt9q7UtuY8TdPI6T8eAx1WxsHp5i38siySOMQrZ5wyc0A1xUFpLQ9s7DErBfFTdmeM3Gw73Clgxb4wN5uWpfGNgU68VkOFZMBu9ss2axWxrwMLfVR1WSBl7r02mgEKMO2pA59QVgKwdB04t89/1O/w1cDnyilFU=');

     //    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'd2a932fbcb794319177f57f78cdc9493']);

     //    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
     //    $response = $bot->pushMessage("C37b9367ba0f9b63beb35050a1aad9a68", $textMessageBuilder);

    	return response()->json([
    		'name' => $name,
    	]);
    }
}
