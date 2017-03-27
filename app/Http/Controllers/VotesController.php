<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunityLink;
use App\CommunityLinkVote;

class VotesController extends Controller
{
    /**
     * VotesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Find the Community link vote and either delete it or save it.
     *
     * @param CommunityLink $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommunityLink $link)
    {

        //auth()->user()->voteFor($link);

        $vote = CommunityLinkVote::firstOrNew([
            'user_id' => auth()->id(),
            'community_link_id' => $link->id
        ]);

        if ($vote->exists) {
            $vote->delete();
        } else {
            $vote->save();
        }

        return back();
    }
}
