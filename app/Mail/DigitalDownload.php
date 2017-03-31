<?php

namespace App\Mail;


use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



class DigitalDownload extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    /**
     * @var Order
     */
    protected $order;


    /**
     * Create a new message instance.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
         $this->order = $order;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.download')
            ->subject('Your Key Download Instructions')
            ->with([
                'orderName' => $this->order->billing_name,
                'orderNumber' => $this->order->order_number,
                'orderEmail' => $this->order->email,
                'orderURL' => $this->order->onetimeurl
            ]);

    }

}
