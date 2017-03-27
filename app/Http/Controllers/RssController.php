<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Exceptions\RSSNotFoundException;

class RssController extends Controller
{
    /**
     * Grab the latest posts and create an RSS Atom feed.
     *
     */
    public function generate()
    {
        try {

            $posts = Post::latest()->published()->take(10)->get();

            //dd($posts);

            if ($posts->isEmpty()) {

                return 'no RSS feeds today';

            } else {

                $feed = \App::make('feed');
                $feed->title = 'Gamesstation';
                $feed->description = 'Powerful Minds';
                $feed->logo = asset('images/logo_medium.png'); //optional
                $feed->link = url('feed');
                $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
                $feed->pubdate = $posts[0]->created_at;
                $feed->lang = 'en';
                $feed->setShortening(true); // true or false
                $feed->setTextLimit(100); // maximum length of description text


                foreach ($posts as $post) {
                    // set item's title, author, url, pubdate, description and content
                    $feed->add($post->title, 'Author', url('posts/' . $post->id), $post->created_at, $post->content, $post->content);
                }
            }

        } catch (\Exception $e) {

            throw new RSSNotFoundException($e->getMessage());
        }

        return $feed->render('rss'); // or atom
    }
}
