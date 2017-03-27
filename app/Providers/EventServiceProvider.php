<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\PostWasCreated' => [
            'App\Listeners\EmailPostPublished',
        ],

        'App\Events\PostWasUpdated' => [
            'App\Listeners\EmailPostUpdate',
        ],

        'App\Events\ProfileWasCreated' => [
            'App\Listeners\EmailProfilePublished'
        ],

        'App\Events\CheckoutWasCompleted' => [
            'App\Listeners\EmailCheckoutCompleted'
        ],


        'App\Events\UserHasRegistered' => [
            'App\Listeners\EmailRegistration'
        ],

        'App\Events\ContactWasSent' => [
            'App\Listeners\SendContactConfirmation'
        ],

        'App\Events\ProductWasCreated' => [
            'App\Listeners\EmailProductPublished'
        ],

        'App\Events\ProductWasUpdated' => [
            'App\Listeners\EmailProductUpdated'
        ],

        'App\Events\SupportWasSent' => [
            'App\Listeners\EmailSupportNotification'
        ],

        'App\Events\MessagePosted' => [
            'App\Listeners\MessageNotification'
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
