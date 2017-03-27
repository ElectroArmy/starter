<?php

namespace App\Events;

use App\Post;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;


class PostWasUpdated extends Event implements ShouldQueue
{
    use SerializesModels;

    /**
     * @var User
     */
    public $user;
    /**
     * @var Post
     */
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
