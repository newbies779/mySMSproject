<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $user = new App\User;
        $user->name = 'kanor';
        $user->email = 'newbies_747@hotmail.com';
        $user->password = bcrypt('0859947192');
        $user->role = 'guess';
        $user->save();
        
        $user = new App\User;
        $user->name = 'kanorAdmin';
        $user->email = 'newbies780@gmail.com';
        $user->password = bcrypt('0859947192');
        $user->role = 'Admin';
        $user->save();
        
   }
}
