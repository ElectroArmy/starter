<?php

namespace App\Listeners;

use App\Events\PostWasCreated;
use App\Notifications\PostPublished;
use App\Post;
//use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class EmailPostPublished implements ShouldQueue
{
    /**
     * @var Post
     */
   protected $post;

    /**
     * Create the event listener.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
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
