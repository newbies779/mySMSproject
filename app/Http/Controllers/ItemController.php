<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ItemGetEdit;
use App\Http\Requests;
use App\Item;
use App\Tracking;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ItemController extends Controller
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
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('custom_id')->get();
        $items = $items->load('category', 'users');
        $categories = Category::all();
        return view('admin.showItem', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createItem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'itemid' => 'required|max:100|min:5',
            // 'customid' => 'unique:items,custom_id|max:100|min:5',
            'itemname' => 'required|max:64|min:2|unique:items,name',
            'location' => 'required|max:128|min:2',
            'note' => 'max:512',
            'bought_year' => 'date'
            ]);

        $res=["status" => ""];
        \DB::beginTransaction();

        $itemid = trim($request->input('itemid'));
        $itemname = trim($request->input('itemname'));
        $location = trim($request->input('location'));

        try {
            $tracking = null;
            $item = new Item;
            if ($itemid=='') {
                //If user doesn't put any ID
                $item->item_id = $this->generateRandomId();
                $item->custom_id = $item->item_id;
            } else { 
                if (Item::where('item_id', $itemid)->exists()) {
                    $item->item_id = $itemid;
                    if (Tracking::where('item_id', $itemid)->exists()) {
                        //This itemid is already tracked.
                        $tracking = Tracking::where('item_id', $itemid)->first();
                        $item->custom_id = $itemid.'_'.$tracking->tracking;

                        //update tracking No
                        if ((int)$tracking->tracking<9) {
                            $tracking->tracking = '0'.strval(intval($tracking->tracking)+1);
                        } else {
                            $tracking->tracking = strval(intval($tracking->tracking)+1);
                        }
                        $tracking->save();
                    } else {
                        //This itemid is not tracked yet.
                        \DB::table('tracking')->insert(['item_id' => $itemid, 'tracking' => '02']);
                        \DB::table('items')
                            ->where('item_id', $itemid)
                            ->update(['custom_id' => $itemid.'_00']);
                        $item->custom_id = $itemid.'_01';
                    }
                } else {
                    $item->item_id = $itemid;
                    $item->custom_id = $itemid;
                }
            }
            $item->name = $itemname;
            $item->status = 'Available';
            $item->location = $location;
            $item->category_id = $request->input('category');
            $item->note = trim($request->input('note'));
            if ($request->input('bought_year') != "") {
                $item->bought_year = trim($request->input('bought_year'));
            }
            
            $item->save();
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
            $res = ["status" => "error_exception", "err_msg" => $e->getMessage()];
            flash($res['message'], $res['status']);
            return redirect()->route('item.index');
        }

        $res['status'] = "success";
        $res['message'] = "Create Item Success";

        flash($res['message'], $res['status']);
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //use Modal instead
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $validator = Validator::make($request->all(), $this->validation($request));

        if ($validator->fails()) {
            return redirect('/home')
            ->withErrors($validator)
            ->withInput();
        }
        $returnStatus = $item->updateItem($item, $request);
        if ($returnStatus['status'] == "success") {
            flash($returnStatus['message'], 'info');
            event(new ItemGetEdit($item->status, Auth::user()->id, $item->id));
            return redirect('/item');
        }

        flash($returnStatus['message'], 'warning');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * generate random id if user doesn't put the ID when create new item
     * @return [type] [description]
     */
    public function generateRandomId()
    {
        $searchPattern = 'AUTOGEN_'.Carbon::now()->year; //AUTOGEN_2016
        $generateID = '';
        if(Tracking::where('item_id', $searchPattern)->exists()){
            $track = Tracking::where('item_id', $searchPattern)->first();
            $generateID = $track->tracking;
            $track->tracking += 1;
            $track->save();
        }else{
            //Add new tracking
            $track = new Tracking;
            $track->item_id = $searchPattern;
            $track->tracking = Carbon::now()->format('Y') + 543 - 2500 . Carbon::now()->format('md').'000'; //591021000
            $track->save();
            $generateID = $track->tracking;

            //Update Tracking
            $track->tracking += 1;
            $track->save();
        }
        return $generateID;
    }
}
