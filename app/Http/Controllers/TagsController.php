<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\TagNotFoundException;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Grab the tags ordered by name and group them in to alphabetical order to ensure
     * that they are passed to the tag index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::orderBy('name')->get()->groupBy(function ($tag) {
            return substr($tag->name, 0, 1);
        });
        //return $tags;

        return view('tags.index', compact('tags'));

    }


    /**
     * Show the article form to fetch the tags.
     *
     * @param Tag $tag
     * @return \Illuminate\View\View
     * @throws TagNotFoundException
     */
    public function show($tag)
    {
        try
        {
            $posts = $tag->posts;

            $index = 'Search Tags';

        } catch (TagNotFoundException $e) {

            throw new TagNotFoundException($e->getMessage());
        }
        return view('tags.show', compact('posts', 'index', 'posts'));
    }

}
