<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function validation($request){
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
        $items = Item::all()->load('category');
        $categories = \DB::table('categories')->pluck('name','id');
        return view('admin.showItem', compact('items','categories'));
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
            'itemid' => 'required|max:100|min:5',
            'customid' => 'unique:items,custom_id|max:100|min:5',
            'itemname' => 'required|max:64|min:2',
            'status' => 'required|max:64|min:2',
            'location' => 'required|max:128|min:2',
            'note' => 'max:512',
            'bought_year' => 'date'
        ]);

        $res=["status" => ""];

        \DB::beginTransaction();

        try{
            $item = new Item;
            $item->item_id = $request->input('itemid');
            if($request->input('customid')===''){
                $item->custom_id = $request->input('itemid');
            }else{
                $item->custom_id = $request->input('customid');
            }
            $item->name = $request->input('itemname');
            $item->status = $request->input('status');
            $item->location = $request->input('location');
            $item->category_id = $request->input('category');
            $item->note = $request->input('note');
            $item->bought_year = $request->input('bought_year');
            $item->save();
            \DB::commit();
        }catch(Exception $e){
            \DB::rollback();
            $res = ["status" => "error_exception", "err_msg" => $e->getMessage()];
            flash($res['message'],$res['status']);
            return redirect()->route('item.index');
        }
       
        $res['status'] = "success";
        $res['message'] = "Create Item Success";

        flash($res['message'],$res['status']);
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

        $returnStatus = $item->updateItem($item,$request);
        if($returnStatus['status'] == "success"){
            flash($returnStatus['message'],'info');
            return redirect('/item');
        }

        flash($returnStatus['message'],'warning');
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
}
