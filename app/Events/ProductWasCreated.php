<?php

namespace App\Events;

use App\Product;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductWasCreated extends Event implements ShouldQueue
{
    use SerializesModels;

    /**
     * @var User
     */
    public $user;
    /**
     * @var Product
     */
    public $product;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Product $product
     */
    public function __construct(User $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
