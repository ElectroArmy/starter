<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class CommunityLinkVote extends Model
{
    protected $table = 'community_links_votes';

    /**
     * Fillable fields for a Community Link Vote.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'community_link_id'];



}