<?php

namespace App\Http\Controllers;

use App\Events\ItemGetReview;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
    }

    public function validation($request)
    {
        return [
            'id' => 'required',
        ];
    }

    /**
     *
     */
    public function index()
    {
        $user       = Auth::user();
        $item       = new Item;
        $reviewItem = $item->getItemRequestbyUpdated();
        return view('admin.reviewadmin', compact('reviewItem'));
    }

    /**
     *
     */
    public function getData()
    {
        $item       = new Item;
        $reviewItem = $item->getItemRequestbyUpdated();
        $reviews    = $reviewItem->toArray();
        //dd(response()->json(['response' => $reviews]));
        return response()->json(['response' => $reviews]);
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validation($request));

        if ($validator->fails()) {
            return redirect('/review')
                ->withErrors($validator)
                ->withInput();
        }

        // dd(
        //     $request->input('id'),
        //     $request->input('status'),
        //     $request->input('note')
        // );

        $item         = new Item;
        $returnReview = $item->updateItemReview($request);
        $itemEvent = $item->getItemObject($request->input('id'));
        if ($returnReview['status'] == "success") {
            flash($returnReview['message'], 'info');
            event(new ItemGetReview($itemEvent->status,Auth::user()->id,$itemEvent->id));
            return redirect('/review');
        }

        flash($returnReview['message'], 'warning');
        return redirect('/review');
    }

}
