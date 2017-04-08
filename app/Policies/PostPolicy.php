<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    /**
     * @var User
     */
    public $user;
    /**
     * @var Post
     */
    public $post;

    /**
     * Create a new policy instance.
     *
     * @param User $user
     * @param Post $post
     */
    public function __construct(User $user, Post $post)
    {

        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }


    /**
     * Determine if the given post can be deleted by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
