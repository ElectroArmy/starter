<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Exceptions\PostNotFoundException;
use App\Exceptions\SlugNotFoundException;

class PostsController extends Controller
{
    /**
     * Display all the blog posts.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     * @throws PostNotFoundException
     */
    public function index(Request $request)
    {

        try {
            $query = $request->input('q');

            if ($query) {

                $posts = Post::search($query)->get();

                return view('posts.search', compact('posts'));

            } else {

                $posts = Post::latest('published_at')->published()->paginate(7);

                $index = 'Show all Posts';
            }

        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());

        }

        return view('posts.index', compact('posts', 'index'));
    }




    /**
     * Show the form to display the post.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     * @throws PostNotFoundException
     * @internal param $id
     */
    public function show(Post $post)
    {
        try {
            $index = 'Show a Post';

        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());
        }

        return view('posts.show', compact('post', 'index'));

    }


    /**
     * Show the slug within the show page
     * @param $slug
     * @return \Illuminate\Http\Response
     * @throws SlugNotFoundException
     * @internal param Post $post
     */

    public function showSlug($slug)
    {
        try {

            $post = Post::findBySlug($slug);

        } catch (\Exception $e) {

            throw new SlugNotFoundException($e->getMessage());
        }

        return $this->show($post);
    }

}
