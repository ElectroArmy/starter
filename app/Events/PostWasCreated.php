<?php

namespace App\Events;

use App\Post;
use App\User;
use Illuminate\Queue\SerializesModels;


class PostWasCreated extends Event
{
    use SerializesModels;

    /**
     * @var User
     */
    public $user;

    public $post;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Post $post
     */
    public function __construct(User $user, Post $post)
    {

        $this->user = $user;
        $this->post = $post;
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
