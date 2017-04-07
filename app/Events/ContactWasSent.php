<?php

namespace App\Events;



use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;


class ContactWasSent extends Event
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
