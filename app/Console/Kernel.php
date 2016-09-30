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
            $users = User::all();
            $arr_rent_to_mail = [
                [],
                [],
                []
            ];
            
            foreach ($users as $user) {
                $i = 0;
                $triggerSendMail = false;
                foreach ($user->rents as $rent) {
                    //check rentlist that have return date only.
                    if(!is_null($rent->return_date) && $rent->item->status == 'Borrowed'){
                        //find the date different
                        $datediff = strtotime($rent->return_date) - strtotime('now');
                        $datediff = ceil($datediff/(60*60*24));

                        if((int)$datediff == 3 || (int)$datediff <=0){
                            //store who, days, itemname to array
                            $arr_rent_to_mail[$i++] = [
                                'user_id' => $user->id, 
                                'days' => $datediff,
                                'itemname' => $rent->item->name
                            ];
                            $triggerSendMail = true;
                        }
                   }
                }
                if($triggerSendMail){
                    $this->sendMailToUser($arr_rent_to_mail);
                }
            }
        })->dailyAt('6:00');    
    }

    public function sendMailToUser($arr_rent_to_mail)
    {
        $description = '';

        foreach ($arr_rent_to_mail as $arr_rent) {
            $description .= "Your ". $arr_rent["itemname"]." have ".(int)$arr_rent["days"]." days left to be returned.\r\n";
        }
        

        $user = User::findOrFail($arr_rent_to_mail[0]['user_id']);
        Mail::send('emails.mailToNotifyUserReturnDue', ['user' => $user, 'description' => nl2br($description,false)], function($m) use ($user){
            $m->from('Newbies780@gmail.com', 'Anupong Chuen-Im');

            $m->to($user->email, $user->name)->subject('Your Notification');
        });  
    }
}
