<?php

namespace App\Console;

use App\User;
use Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function(){
            $user = User::findOrFail(1);
            Mail::send('emails.mailToNotifyUserReturnDue', ['user' => $user], function($m) use ($user){
                $m->from('Newbies780@gmail.com', 'Anupong Chuen-Im');
                    // dd($user);
                $m->to($user->email, $user->name)->subject('Your Notification');
            });  
        })->everyMinute();
    }
}
