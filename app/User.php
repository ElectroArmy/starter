<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email',  'is_admin','password', 'password_confirmation'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];


    /**
     * Relationship Identifier owns method.
     *
     * @param $related
     * @return bool
     */
    public function owns($related)
    {
        return $this->id == $related->user_id;
    }

    /**
     * Determines the username for the User Model.
     *
     * @param $query
     * @param $username
     * @return mixed
     */
    public function scopeWhereUsername($query, $username)
    {
        return $query->where('username', '=', $username);
    }

    /**
     * Determines if the current user object is the
     * current authenticated user. Meaning if false
     * link is not shown if true the link is shown.
     * @return bool
     */
    public function isCurrent()
    {
        if (Auth::guest()) return false;

        return Auth::user()->id == $this->id;
    }

    /**
     * Relationship A user has one dashboard.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
     * Relationship
     *
     * A user can have many posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    /**
     * Relationship
     *
     * A user can have many products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }


    /**
     * Relationship
     *
     * Get the activity timeline for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany('App\Activity');

    }

    /**
     * Relationship
     *
     * A user can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Relationship
     * A user can have many votes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_links_votes')
            ->withTimestamps();
    }

    /**
     * Relationship A User can have many Carts.
     *
     * @return mixed
     */
    public function cart()
    {
        return $this->hasMany('App\Cart')->where('complete', 0);
    }


    /**
     * Scope
     *
     * @param $query
     * @return mixed
     */
    public function scopeLatest($query)
    {
        return $query->orderBy("updated_at", "desc")->first();
    }


    /**
     * Determine if a user is Trusted.
     *
     * @return mixed
     */
    public function isTrusted()
    {
        return $this->trusted;
    }




    /**
     * Determines the toggle vote.
     *
     * @param CommunityLink $link
     * @return Model
     */
    public function voteFor(CommunityLink $link)
    {
        return $this->votes()->toggle($link);
    }

    /**
     * Determines the toggle to unvote.
     * @param CommunityLink $link
     * @return Model
     */
    public function unvoteFor(CommunityLink $link)
    {
        return $this->votes()->toggle($link);
    }


    /**
     * Determines the URL for the contributed links.
     *
     * @param $url
     * @return mixed
     */
    public function contributeLink($url)
    {
        return $this->links()->create(compact('url'));
    }

    /**
     * Record new activity for the user.
     *
     * @param $name
     * @param $related
     * @return mixed
     * @throws \Exception
     */
    public function recordActivity($name, $related)
    {
        if (! method_exists($related, 'recordActivity')) {
            throw new \Exception('..');
        }
        return $related->recordActivity($name);
    }





    /**
     * Retrieves Sterling currency for Cashier.
     *
     * @return string
     */
    public function getCurrency()
    {
        return 'gbp';
    }

    /**
     * Checks to see if it is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Admin')
            {
                return true;
            }
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);

    }
}
