<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rent_list_items')->truncate();
        DB::table('logs')->truncate();
        DB::table('items')->truncate();
        DB::table('categories')->truncate();
        DB::table('users')->truncate();
        $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        // $this->call(RentListTableSeeder::class);
        $this->call(LogTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
