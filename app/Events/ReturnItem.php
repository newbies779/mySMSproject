<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReturnItem extends Event
{
    use SerializesModels;

   public $status;
       public $user_id;
       public $item_id;

       /**
        * Create a new event instance.
        *
        * @return void
        */
       
       public function __construct($status, $user_id, $item_id)
       {
           $this->status = $status;
           $this->user_id = $user_id;
           $this->item_id = $item_id;
       }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
