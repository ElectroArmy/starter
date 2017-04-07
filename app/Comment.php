<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model {

    use RecordActivity;

    /**
     * Additional field to set to record activity on the comment model.
     *
     * @var array
     */
    protected static $recordEvents = ['created'];

    /**
     * Fillable fields for a Comment.
     *
     * @var array
     */
    protected $fillable = [
        'author','body'
    ];


    /**
     * Relationship
     *
     *  Comments belong to one user.
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
     * Comments belong to one user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');


    }


    /**
     * Return the name associated with this comment.
     *
     * @return mixed
     */
    public function name()
    {
        return $this->user->name;
    }





    /**
     * Accessor
     *
     * Return the published attribute and convert to
     * a certain format.
     *
     * @param $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    /**
     * Setter
     *
     * Set the published_at attribute mutator.
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date)->format('DD-MM-YYYY');

    }


    /**
     * Accessor
     * Grab the created at attribute and convert it to a UK format.
     *
     * @param $date
     * @return string
     */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    /**
     * Accessor
     * Grab the updated at attribute and convert it to a UK format.
     *
     * @param $date
     * @return string
     */
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }





    /**
     * Return the username associated with this comment.
     *
     * @return mixed
     */
    public function username()
    {
        return $this->user->username;
    }


    /**
     * Scopes
     * Return the published updated comments before now.
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('updated_at', '<=', Carbon::now());
    }


    /**
     * Scopes
     *
     * Find the owner of a post.
     *
     * @param $query
     * @param Post $post
     * @return mixed
     *
     */
    public function scopeForPost($query, Post $post)
    {
        return $query->with('owner')->where('post_id', $post->id);

    }

    /**
     * Use a custom collection for all comments.
     *
     * @param array $models
     * @return CommentCollection
     */
    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }


    }
