<?php

namespace App\Policies;


use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    /**
     * @var User
     */
    public $user;
    /**
     * @var Product
     */
    public $product;

    /**
     * Create a new policy instance.
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
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User $user
     * @param Product $product
     * @return bool
     *
     */
    public function update(User $user, Product $product)
    {
        return $user->id === $product->user_id;
    }


    /**
     * Determine if the given post can be deleted by the user.
     *
     * @param  \App\User $user
     * @param Product $product
     * @return bool
     *
     */
    public function delete(User $user, Product $product)
    {
        return $user->id === $product->user_id;
    }

}
