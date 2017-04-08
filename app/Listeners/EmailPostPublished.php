<?php

namespace App\Listeners;

use App\Events\PostWasCreated;
use App\Notifications\PostPublished;
use App\Post;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;


class EmailPostPublished implements ShouldQueue
{
    /**
     * @var Post
     */
   public $post;
    /**
     * @var User
     */
    public $user;

    /**
     * Create the event listener.
     *
     * @param Post $post
     */
    public function __construct(User $user, Post $post)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  PostWasCreated $event
     * @internal param Post $post
     */
    public function handle(PostWasCreated $event)
    {
        $event->user->notify(new PostPublished($event->post));

        flash()->success('Post Published', 'Your blog post has been published.');
    }
}
