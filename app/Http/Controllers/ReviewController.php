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
        $assignees  = User::roleUser()->orderBy('name')->get();
        $reviewItem = $item->getItemRequestbyUpdated();
        $users      = User::all();
        return view('admin.reviewadmin', compact('reviewItem', 'assignees', 'users'));
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
        //     $request->input('note'),
        //     $request->input('assignee_id'),
        //     $request->input('assignee_location')

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
