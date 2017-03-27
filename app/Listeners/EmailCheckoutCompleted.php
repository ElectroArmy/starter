<?php

namespace App\Listeners;


use App\Events\CheckoutWasCompleted;
use App\Notifications\CompletedCheckout;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Queue\InteractsWithQueue;


class EmailCheckoutCompleted implements ShouldQueue
{
    /**
     * @var User
     */
    protected $user;


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
     * @param  CheckoutWasCompleted $event
     * @internal param User $user
     */
    public function handle(CheckoutWasCompleted $event)
    {

        flash()->success('Checkout Completed', 'Checkout has been completed.');

        $event->user->notify(new CompletedCheckout($event->user));


    }
}

