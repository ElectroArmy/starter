<?php

namespace App\Listeners;

use App\Events\ProductWasUpdated;
use App\Notifications\KeyUpdated;
use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailProductUpdated implements ShouldQueue
{
    /**
     * @var Product
     */
    protected $product;

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
     * @param  ProductWasUpdated  $event
     * @return void
     */
    public function handle(ProductWasUpdated $event)
    {
        $event->user->notify(new KeyUpdated($event->product));

        flash()->success('Key Updated', 'Your key has been successfully updated.');
    }
}
