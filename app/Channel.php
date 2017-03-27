<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * Fillable fields for a Channel.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'color'];

    /**
     * Grab the slug from the channel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
