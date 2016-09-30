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
        $user->name = 'Anupong Chuen-Im';
        $user->email = 'newbies_747@hotmail.com';
        $user->password = bcrypt('0859947192');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'kanorAdmin';
        $user->email = 'newbies780@gmail.com';
        $user->password = bcrypt('0859947192');
        $user->role = 'Admin';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Suphaphorn Rungkrae';
        $user->email = 'bewith21@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'Admin';
        $user->save();
        
        $user = new App\User;
        $user->name = 'DummyUser';
        $user->email = 'dummy@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Yuthnattee Tohreh';
        $user->email = 'blackcat2bc@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Thanakorn Ungkanasarn';
        $user->email = 'thanakorn.tifel@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Sattaya Metharakcheep';
        $user->email = 'sattayametha@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Naratthawan Threechownon';
        $user->email = 'threenara@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Orachun Udomkasemsub';
        $user->email = 'orachun.chun@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Pattamon Somnukguandee';
        $user->email = 'tamarindmakram@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Karunpas Limkhuansuwan';
        $user->email = 'ake072@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Pansiri Thanariyawong';
        $user->email = 'patinyanudklin@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Gunjanaporn Jaemkangwal';
        $user->email = 'gunnsodsai@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Narayut Pudjaika';
        $user->email = 'narayutput@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'pornpon phanpobe';
        $user->email = 'pphanpobe@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Amrine Wannawijit';
        $user->email = 'aump.tifel@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Singha Wongdeethai';
        $user->email = 'singha.won@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Suputtra Sutthiprapa';
        $user->email = 'suputtra.sutt@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Thipaporn Nuntasuworakul';
        $user->email = 'ningthipaporn@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
        $user = new App\User;
        $user->name = 'Nuttawarin Sinsangkaew';
        $user->email = 'benbiot20@gmail.com';
        $user->password = bcrypt('12341234');
        $user->role = 'User';
        $user->save();
        
   }
}
