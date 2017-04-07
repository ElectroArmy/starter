<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\CommunityLinkAlreadySubmitted as CommunityLinkAlreadySubmitted;


class CommunityLink extends Model
{
    /**
     * Protected fillable community links fields.
     *
     * @var array
     */
    protected $fillable = [
        'channel_id', 'title', 'link'
    ];

    /**
     * Determine the user from the community link id and return
     * the trusted and approved links,
     *
     * @param \App\User $user
     * @return static
     */
    public static function from(User $user)
    {
        $link = new static;

        $link->user_id = $user->id;

        if($user->isTrusted()){
            $link->approve();
        }

        return $link;



    }

    /**
     * Determine if the community link submitted has already been submitted and then either
     * create new links or return to the previous function.
     *
     * @param $attributes
     * @return bool
     * @throws CommunityLinkAlreadySubmitted
     */
    public function contribute($attributes)
    {
        if($existing = $this->hasAlreadyBeenSubmitted($attributes['link'])) {
            $existing->touch();

            throw new CommunityLinkAlreadySubmitted;
        }

        return $this->fill($attributes)->save();
    }

    /**
     * Scope
     * Scope the query for records for a channel.
     *
     * @param Builder $builder
     * @param Channel $channel
     * @return Builder
     */
    public function scopeForChannel($builder, $channel)
    {
        if ($channel->exists) {
            return $builder->where('channel_id', $channel->id);
        }

        return $builder;
    }

    /**
     * Mark the community link as approved.
     *
     * @return $this
     */
    public function approve()
    {
        $this->approved = true;

        return $this;
    }

    /**
     * Relationship
     * A Community link belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship
     * A community link belongs to a Channel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }


    /**
     * Relationship
     *
     * A community link may have many votes.
     *
     * @var TYPE_NAME $this
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(CommunityLinkVote::class, 'community_link_id');
    }

    /**
     * Scope
     *
     * Determine if the link has already been submitted.
     * @param string $link
     * @return mixed
     */
    protected function hasAlreadyBeenSubmitted($link)
    {
        return static::where('link', $link)->first();
    }


}

