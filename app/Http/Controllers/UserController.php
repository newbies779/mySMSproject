<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\RentListItem;
use App\User;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
    }

    public function sendEmailNotifyUserReturnDue(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rentList = RentListItem::all();
        
        foreach ($rentList as $rent) {
            if(strtotime('now') >= strtotime($rent->return_date)){
                
            }
        }   

        Mail::send('emails.mailToNotifyUserReturnDue', ['user' => $user], function($m) use ($user){
            $m->from('Newbies780@gmail.com', 'Anupong Chuen-Im');
                // dd($user);
            $m->to($user->email, $user->name)->subject('Your Notification');
        });  
        flash('Send Email Completed','info');

        // $this->dispatch(new SendEmailToNotifyUser($user));

        return back();
    }

    public function sendEmailNotifyAdminReturnDue($id)
    {
    	$user = User::findOrFail($id);

        try{
            Mail::send('emails.mailToNotifyUserReturnDue', ['user' => $user], function($m) use ($user){
                $m->from('Newbies780@gmail.com', 'Anupong Chuen-Im');
            // dd($user);
                $m->to($user->email, $user->name)->subject('Your Notification');
            });  
            flash('Send Email Completed','info');
        }catch (Exception $e){
            flash($e,'danger');
        }

        
        return back();
    }
}
