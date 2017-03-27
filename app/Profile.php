<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'city',
        'postcode',
        'country',
        'phone',
        'bio',
        'twitter_username',
        'github_username'
    ];

    /**
     * Relationship a profile belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}