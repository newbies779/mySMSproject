<?php

use Illuminate\Database\Seeder;

class RentListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\RentListItem', 20)->create();
    }
}
