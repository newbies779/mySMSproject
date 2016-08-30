<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{

    /**
     * [index description]
     * Check if the user is already auth
     * @return [type] [description]
     *         url to proper route
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        	return view('/welcome');
    }
}
