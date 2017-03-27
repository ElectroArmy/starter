<?php

namespace App\Jobs;

use App\Listeners\EmailProductPublished;
use App\Notifications\KeyPublished;
use App\Product;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Product
     */
    public $product;
    /**
     * @var User
     */
    public $user;

    /**
     * Create a new job instance.
     *
     * @param Product $product
     * @param User $user
     */
    public function __construct(Product $product, User $user)
    {

        $this->product = $product;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param EmailProductPublished $event
     * @return void
     */
    public function handle(EmailProductPublished $event)
    {
        $event->user->notify(new KeyPublished($event->product));
    }
}
