<?php

namespace App\Mail;

use App\Http\Requests\SupportRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



class SupportSent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @param SupportRequest $request
     * @return $this
     */
    public function build(SupportRequest $request)
    {

        return $this->view('emails.support.support')

            ->with([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'problem' => $request->get('problem')
            ])
            ->from(['email' => $request->get('email')]);


    }
}
