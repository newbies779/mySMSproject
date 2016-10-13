<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users', 'categories', 'items', 'logs', 'rent_list_items', 'tracking'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(RentListTableSeeder::class);
        // $this->call(LogTableSeeder::class);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
