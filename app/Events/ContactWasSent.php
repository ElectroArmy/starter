<?php

namespace App\Events;



use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
//use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ContactWasSent extends Event implements ShouldQueue
{
    use SerializesModels;


    /**
     * Create a new event instance.
     *
     *
     */
    public function __construct()
    {


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
