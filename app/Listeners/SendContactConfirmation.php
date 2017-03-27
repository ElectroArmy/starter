<?php

namespace App\Listeners;

use App\Http\Requests\ContactFormRequest;
use App\Events\ContactWasSent;
use App\Mail\ContactSent;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactConfirmation implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     *
     */
    public function __construct()
    {


    }

    /**
     * Handle the event.
     *
     * @param  ContactWasSent $event
     * @internal param $data
     */
    public function handle(ContactWasSent $event)
    {
        $when = Carbon::now()->addMinutes(10);

        Mail::to('administrator@ormrepo.co.uk')
                ->later($when, new ContactSent($event));


        flash()->success('Success', 'We can confirm that your message has been successfully sent.');
    }
}
