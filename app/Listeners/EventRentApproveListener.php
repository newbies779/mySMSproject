<?php

namespace App\Listeners;

use App\Events\AdminRentApprove;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventRentApproveListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdminRentApprove  $event
     * @return void
     */
    public function handle(AdminRentApprove $event)
    {
        var_dump($event->user);
    }
}
