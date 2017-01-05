<?php

namespace App;

use App\Item;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class RentListItem extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date', 'end_date', 'rent_status', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function item()
    {
    	return $this->belongsTo(Item::class);
    }

    public function getRentRequest()
    {
        return $this->orderBy('id','desc')->get();
    }

    public function getRentOrderDesc($user_id){
        return $this->where('user_id',$user_id)->orderBy('id','desc')->get();
    }

    public function getRentObject(Item $item){
        return $this->where('item_id',$item->id)->orderBy('id','desc')->first();
    }


    public function setRentApprove($rent, $updateStatus)
    {
        $res=["status" => ""];
            DB::beginTransaction();
            try{
                $rent->rent_status = "Approved";
                $rent->updated_at = Carbon::now();
                $rent->save();

                $item = new item;
                $item = $item->getItemObject($rent->item_id);
                $item->status = $updateStatus;
                $item->save();

                DB::commit();
            } catch (exception $e){
                DB::rollback();
                $res = ["status" => "error_exception", "err_msg" => $e->getMessage(), "tab" => "rent"];
            }

            $res = ["status" => "success", 'message' => "Approve Rent Success", "tab" => "rent"];
            return $res;
    }

    public function setReturnApprove($rent, $updateStatus)
    {
        $res=["status" => ""];
            DB::beginTransaction();
            try{
                $rent->return_status = "Approved";
                $rent->updated_at = Carbon::now();
                $rent->save();

                $item = new item;
                $item = $item->getItemObject($rent->item_id);
                $item->status = $updateStatus;
                $item->save();

                DB::commit();
            } catch (exception $e){
                DB::rollback();
                $res = ["status" => "error_exception", "err_msg" => $e->getMessage(), "tab" => "return"];
            }

            $res = ["status" => "success", "message" => "Approve Return Success", "tab" => "return"];
            return $res;
    }
}
