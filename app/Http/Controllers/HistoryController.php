<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Logs;
use App\Http\Requests;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
    }

    public function index()
    {
    	$logs = Logs::forHistory()->get();
    	return view('admin.historyadmin', compact('logs'));
    }
}
