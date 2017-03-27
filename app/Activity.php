<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * Fillable fields for an Activity.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id',
        'subject_type',
        'name',
        'user_id'
    ];

    /**
     * Get the user responsible for the given activity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }




    /**
     * Relationship
     *
     * Get the subject of the activity using polymorphism.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function subject()
    {
        return $this->morphTo();
    }
}
