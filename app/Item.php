<?php

namespace App;

use App\RentListItem;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'location', 'name', 'bought_year'
    ];


    public function rent()
    {
    	return $this->hasMany(RentListItem::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function getItemObject($id){
        // dd($this->where('id',$id)->first());
        return $this->where('id',$id)->first();
    }

    public function scopeAvailable($query)
    {
        return $query->where('status','Available');
    }

    public function scopeCategoryRentable($query)
    {
        return $query->select(array
                (
                    'items.*'
                ))
                ->join('categories','categories.id','=','items.category_id','left')
                ->where('categories.rentable','1');                
    }

    public function updateItem($item, $request, $updateStatus='update'){

        $res=["status" => ""];
        $rentList = new RentListItem;

        switch($updateStatus){
            case 'Reserved':
                DB::beginTransaction();
                try{
                    $rentList->rent_date = Carbon::now();
                    $rentList->rent_req_date = $request->input('RentDate');
                    if($request->input('ReturnDate')!=""){
                        $rentList->return_date = $request->input('ReturnDate');
                    }
                    $rentList->rent_status = "Pending";
                    $rentList->return_status = "No";
                    $rentList->rent_req_note = $request->input('Note');
                    $rentList->user_id = Auth::user()->id;
                    $rentList->item_id = $item->id;
                    $rentList->save();

                    $item->status = $updateStatus;
                    $item->save();

                    DB::commit();
                } catch (exception $e){
                    DB::rollback();
                    $res = ["status" => "error_exception", "err_msg" => $e->getMessage()];
                    return $res;
                }

                $res['status'] = "success";
                $res['message'] = "Rent Item Success";
                return $res;

            case 'ReturnPending':
                DB::beginTransaction();

                $rentList = $rentList->getRentObject($item);
                try{
                    $rentList->return_date = Carbon::now();
                    $rentList->return_req_date = $request->input('ReturnDate');
                    $rentList->return_status = "Pending";
                    $rentList->return_req_note = $request->input('NoteReturn');
                    $rentList->save();

                    $item->status = $updateStatus;
                    $item->save();

                    DB::commit();
                } catch (exception $e){
                    DB::rollback();
                    $res = ["status" => "error_exception", "err_msg" => $e->getMessage()];
                    return $res;
                }

                $res = ["status" => "success", 'message' => "Return Item Success"];
                return $res;

            case 'update':
                DB::beginTransaction();

                try{
                    $item->custom_id = $request->itemid;
                    $item->name = $request->itemname;
                    $item->status = $request->status;
                    $item->location = $request->location;
                    $item->note = $request->note;
                    $item->bought_year = $request->bought_year;
                    $item->save();

                    DB::commit();
                } catch (exception $e){
                    DB::rollback();
                    $res = ["status" => "error_exception", "err_msg" => $e->getMessage()];
                    return $res;
                }

                $res = ["status" => "success", 'message' => "Update Item Success"];
                return $res;

        }
    }
}
