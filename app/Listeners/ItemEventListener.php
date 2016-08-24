<?php

namespace App\Listeners;

use App\Item;
use App\Logs;
use Illuminate\Support\Facades\Log;

class ItemEventListener
{
    /**
     * Handle Item Create
     */
    public function onItemCreate($event)
    {
        \DB::beginTransaction();
        try{
            $log = new Logs;
            $log->status = $event->status;
            $log->user_id = $event->user_id;
            $log->item_id = $event->item_id;
            $log->save();
            \DB::commit();
        }catch(Exception $e){
            Log::error($e);
        }
        Log::log('info', 'log item create');
    }

    /**
     * Handle Item Edit
     */
    public function onItemGetEdit($event)
    {
        \DB::beginTransaction();
        try{
            $log = new Logs;
            $log->status = $event->status;
            $log->user_id = $event->user_id;
            $log->item_id = $event->item_id;
            $log->save();
            \DB::commit();
        }catch(Exception $e){
            Log::error($e);
        }
        Log::log('info', 'log item create');
    }

    /**
     * Handle Item Review
     */
    public function onItemGetReview($event)
    {
        \DB::beginTransaction();
        try{
            $log = new Logs;
            $log->status = $event->status;
            $log->user_id = $event->user_id;
            $log->item_id = $event->item_id;
            $log->save();
            \DB::commit();
        }catch(Exception $e){
            Log::error($e);
        }
        Log::log('info', 'log item create');
    }

    /**
     * Handle Item Review
     */
    public function onItemRent($event)
    {
        \DB::beginTransaction();
        try{
            $log = new Logs;
            $log->status = $event->status;
            $log->user_id = $event->user_id;
            $log->item_id = $event->item_id;
            $log->save();
            \DB::commit();
        }catch(Exception $e){
            Log::error($e);
        }
        Log::log('info', 'log item create');
    }

    /**
     * Handle Item Review
     */
    public function onItemReturn($event)
    {
        \DB::beginTransaction();
        try{
            $log = new Logs;
            $log->status = $event->status;
            $log->user_id = $event->user_id;
            $log->item_id = $event->item_id;
            $log->save();
            \DB::commit();
        }catch(Exception $e){
            Log::error($e);
        }
        Log::log('info', 'log item create');
    }

    /**
     * Handle Item Review
     */
    public function onItemRentApprove($event)
    {
        \DB::beginTransaction();
        try{
            $log = new Logs;
            $log->status = $event->status;
            $log->user_id = $event->user_id;
            $log->item_id = $event->item_id;
            $log->save();
            \DB::commit();
        }catch(Exception $e){
            Log::error($e);
        }
        Log::log('info', 'log item create');
    }

    /**
     * Handle Item Review
     */
    public function onItemRenturnApprove($event)
    {
        \DB::beginTransaction();
        try{
            $log = new Logs;
            $log->status = $event->status;
            $log->user_id = $event->user_id;
            $log->item_id = $event->item_id;
            $log->save();
            \DB::commit();
        }catch(Exception $e){
            Log::error($e);
        }
        Log::log('info', 'log item create');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ItemCreate',
            'App\Listeners\ItemEventListener@onItemCreate'
        );

        $events->listen(
            'App\Events\ItemGetEdit',
            'App\Listeners\ItemEventListener@onItemGetEdit'
        );

        $events->listen(
            'App\Events\ItemGetReview',
            'App\Listeners\ItemEventListener@onItemGetReview'
        );

        $events->listen(
            'App\Events\RentItem',
            'App\Listeners\ItemEventListener@onItemRent'
        );

        $events->listen(
            'App\Events\ReturnItem',
            'App\Listeners\ItemEventListener@onItemReturn'
        );

        $events->listen(
            'App\Events\RentApprove',
            'App\Listeners\ItemEventListener@onItemRentApprove'
        );

        $events->listen(
            'App\Events\ReturnApprove',
            'App\Listeners\ItemEventListener@onItemRenturnApprove'
        );
    }
}
