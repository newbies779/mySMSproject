<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'note', 'status', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function item()
    {
    	return $this->belongsTo(Item::class);
    }

    public function scopeForHistory($query)
    {
        return $query->orderBy('item_id','asc')->orderBy('created_at', 'asc');
    }

}
