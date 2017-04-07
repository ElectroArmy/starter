<?php

namespace App\Listeners;


use App\Events\UserHasRegistered;
use App\Notifications\NewUser;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRegistration implements ShouldQueue

{

    /**
     * @var User
     */
    public $user;

    /**
     * Create the event listener.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {


        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  UserHasRegistered $event
     *
     */
    public function handle(UserHasRegistered $event)
    {

        $event->user->notify(new NewUser($event->user));

        flash()->overlay('Success!', 'Thankyou for signing up.');

    }

}