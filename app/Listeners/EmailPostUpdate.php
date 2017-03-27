<?php

namespace App\Listeners;

use App\Events\PostWasUpdated;
use App\Notifications\PostUpdated;
//use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Post;

class EmailPostUpdate implements ShouldQueue
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
     * @param  PostWasUpdated  $event
     * @return void
     */
    public function handle(PostWasUpdated $event)
    {
        $event->user->notify(new PostUpdated($event->post));

        flash()->success('Post Updated', 'Your post has been updated.');
    }
}
