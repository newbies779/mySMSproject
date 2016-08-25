<?php

use App\Events\ItemCreate;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 1; $i<=150; $i++){
    		factory('App\Item')->create();
    		$item = \DB::table('items')->select('id','status')->orderBy('id','desc')->first();
    		event(new ItemCreate($item->status, 2 ,$item->id));
    	}	
    }
}
