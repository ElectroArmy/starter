<?php

namespace App\Listeners;

use App\Events\ProfileWasCreated;
use App\Notifications\ProfilePublished;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailProfilePublished implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProfileWasCreated $event
     * @internal param User $user
     */
    public function handle(ProfileWasCreated $event)
    {
        $event->user->notify(new ProfilePublished($event->user));

        flash()->success('Profile Create', 'Your profile has been created.');
    }
}
