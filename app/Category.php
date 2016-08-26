<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','rentable'
    ];

    public function items()
    {
    	return $this->hasMany(Item::class);
    }

    public function addNewCategory($request)
    {
        $res=["status" => ""];

        \DB::beginTransaction();

        try{
            $category = new Category;
            $category->name = $request->input('name');
            $category->rentable = $request->input('Rentable');
            $category->save();
            \DB::commit();

        }catch(Exception $e){
            \DB::rollback();
            $res = ["status" => "error_exception", "err_msg" => $e->getMessage()];
            return $res;
        }
        
        $res['status'] = "success";
        $res['message'] = "Create Category Success";
        return $res;
    }
}
