<?php

namespace App\Events;

use App\Events\Event;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;


class UserHasRegistered extends Event implements ShouldQueue
{
    use SerializesModels;

    /**
     * @var User
     */
    public $user;


    /**
     * Create a new event instance.
     *
     * @param User $user
     *
     *
     */
    public function __construct(User $user)
    {

        $this->user = $user;
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

