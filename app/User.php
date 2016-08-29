<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rents()
    {
        return $this->hasMany(RentListItem::class);
    }

    public function logs()
    {
        return $this->hasMany(Logs::class);
    }

    public function isAdmin($id)
    {
        if($this->where('id',$id)->first()->role == "Admin"){
            return true;
        }

        return false;
    }

    public function scopeRoleUser($query)
    {
        return $query->where('role', 'User');
    }
}
