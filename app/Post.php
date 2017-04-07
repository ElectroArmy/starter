<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Post extends Model
{
    use Searchable, Sluggable, SluggableScopeHelpers, RecordActivity;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Fillable fields for a Post.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'feat_image',
        'user_id',
        'tag',
        'published_at'
    ];


    /**
     * Additional fields to treat as Carbon instances.
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * Additional field to set to record activity on the post model.
     *
     * @var array
     */
    protected static $recordEvents = ['created'];

    /**
     * Relationship
     *
     *  A post belongs to a user.
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
     * Get the tags associated with a given post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Relationship
     *
     * A Post can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    /**
     * Load a threaded set of comments for the post.
     *
     * @return App\CommentsCollection
     */
    public function getThreadedComments()
    {
        return $this->comments()->with('owner')->get()->threaded();
    }


    /**
     * Add a comment to the post.
     *
     * @param array $attributes
     * @return Model
     */
    public function addComment($attributes)
    {
        $comment = (new Comment)->forceFill($attributes);
        $comment->user_id = auth()->id();
        return $this->comments()->save($comment);
    }


    /**
     * Search for the latest comments.
     *
     * @return mixed
     */
    public  function latestComment()
    {
        return $this->hasOne(Comment::class)->latest();

    }


    /*
     * Accessor
     *
     * Return the published attribute and convert to
     * a UK format.
     *
     * @param $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * Accessor
     *
     * Get the taglist attribute id and return it to the form.
     *
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags()->lists('id');
    }



    /**
     * Accessor
     *
     * Return the created attribute and convert to UK
     * format.
     *
     * @param $date
     * @return string
     */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');

    }

    /**
     * Accessor
     *
     * Return the updated attribute and convert to UK
     * format.
     *
     * @param $date
     * @return string
     */
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    /**
     * Setters
     *
     * Set the published_at attribute mutator.
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);

    }

    /**
     * Scope
     *
     * Find the published articles in a query scope.
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Scope
     *
     * Find the unpublished articles in a query scope.
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }


    /**
     * Scope
     *
     * Find the articles created 6 months ago.
     *
     * @param $query
     */
    public function scopeArchive($query)
    {
        $query->where('created_at', '<=', Carbon::now()->subMonths(6));
    }


    /**
     * Scope
     *
     * Find the latest published articles.
     *
     * @param $query
     */
    public function scopeLatest($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

}
