<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function sendEmailNotifyUserReturnDue(Request $request, $id)
    {
    	// dd(Config::get('mail'));
    	$user = User::findOrFail($id);

    	Mail::send('emails.mailToNotifyUserReturnDue', ['user' => $user], function($m) use ($user){
    		$m->from('Newbies780@gmail.com', 'Anupong Chuen-Im');
    		// dd($user);
    		$m->to($user->email, $user->name)->subject('Your Notification');
    	});

    	// flash('Send Email Completed','info');
    	return '5555';
    }
}
