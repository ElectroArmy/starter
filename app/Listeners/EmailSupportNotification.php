<?php

namespace App\Listeners;

use App\Events\SupportWasSent;
use App\Mail\SupportSent;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailSupportNotification implements ShouldQueue
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
     * @param  SupportWasSent  $event
     * @return void
     */
    public function handle(SupportWasSent $event)
    {
        $when = Carbon::now()->addMinutes(2);


        Mail::to('administrator@ormrepo.co.uk')
            ->later($when, new SupportSent($event));


        flash()->success('Success', 'We can confirm that your message has been successfully sent.');
    }
}
