<?php

namespace App;

use App\Item;
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
    
    public function getRentOrderDesc($user_id){
        // dd($this->where('user_id',$user_id)->orderBy('id','desc')->get());
        return $this->where('user_id',$user_id)->orderBy('id','desc')->get();
    }

    public function getRentObject(Item $item){
        //dd($this->where('item_id',$item->id)->get());
        return $this->where('item_id',$item->id)->first();
    }
}
