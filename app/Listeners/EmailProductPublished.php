<?php

namespace App\Listeners;

use App\Events\ProductWasCreated;
use App\Notifications\KeyPublished;
use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailProductPublished implements ShouldQueue
{
    /**
     * @var Product
     */
    public $product;

    /**
     * Create the event listener.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Handle the event.
     *
     * @param  ProductWasCreated  $event
     * @return void
     */
    public function handle(ProductWasCreated $event)
    {
        $event->user->notify(new KeyPublished($event->product));

        flash()->success('Key Created', 'Your key has been successfully published.');
    }
}
