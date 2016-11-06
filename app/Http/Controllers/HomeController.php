<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use App\Http\Requests;
use App\Item;
use App\RentListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Pusher\Facades\Pusher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rent = new RentListItem;
        $items = Item::Available()->CategoryRentable()->get();
        // dd(Session::all());
        $tab = (Session::has('tab')) ? Session::get('tab') : 'rent' ;
        if ($user->role === "Admin") {
            $rentList = $rent->getRentRequest();
            // dd($tab);
            return view('admin.homeadmin', compact('user','items','rentList', 'tab'));
        }

        $rentList = $rent->getRentOrderDesc($user->id);

        return view('home', compact('user','items','rentList'));
    }

}
