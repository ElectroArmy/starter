<?php

namespace App\Http\Controllers\Admin;

use App\Events\PostWasCreated;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\PostWasUpdated;
use App\Exceptions\PostNotFoundException;
use App\Http\Requests\PostRequest;
use App\Post;
use App\RecordActivity;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use App\Comment;


class PostsController extends Controller
{
    use RecordActivity;

    /**
     * Initialise the User object and the alias within the
     * parental constructor method.
     *
     * @internal param User $user
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->middleware('auth');

    }

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

                $user = Auth::user();

                $posts = Post::latest('published_at')->published()->paginate(7);

                $index = 'Show all Posts';


            }

        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());

        }

        return view('admin.posts.index', compact('posts', 'index', 'user'));
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
        try
        {
            $index = 'Show a Post';

            $previous = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();

            $next = Post::where('id', '>', $post->id)->orderBy('id','asc')->first();

            $tags = Tag::pluck('name', 'id');

            $comments = Comment::ForPost($post)->get()->threaded();

        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());
        }



        return view('admin.posts.show')->with([
            'post' => $post,
            'previous' => $previous,
            'next' => $next,
            'index' => $index,
            'tags' => $tags,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     * @throws PostNotFoundException
     */
    public function create()
    {
        try
        {
            $index = 'Create a Post';

            $tags = Tag::pluck('name', 'id');


        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());
        }


        return view('admin.posts.create', compact('post', 'index', 'tags'));
    }


    /**
     * Store a newly created post in storage and flash
     * a message.
     *
     * @param PostRequest|Post $request
     * @param Post $post
     * @return Response
     * @internal param Post $post
     * @internal param $id
     * @internal param Post $post
     */
    public function store(PostRequest $request, Post $post)
    {

        $this->createPost($request);

        $user = auth()->user();

        event(new PostWasCreated($user, $post));

        flash()->success('Post Published', 'Your blog post has been published.');

        return redirect('/');
    }


    /**
     * Show the form for editing a Blog post.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     * @throws PostNotFoundException
     *
     */
    public function edit(Post $post)
    {
        try
        {
            $tags = Tag::pluck('name', 'id');

            $index = 'Edit A Post';

            $user = $this->user;

        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());
        }

        return view('admin.posts.edit', compact('post', 'index', 'user', 'tags'));
    }


    /**
     * Search for the  blog post ID and update the post ID
     * within the database.
     *
     *
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws PostNotFoundException
     */
    public function update(PostRequest $request, Post $post)
    {
        try
        {
            $request->user()->can('update', $post);

        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());
        }

        $post->update($request->all());

        if($request->input('tag_list') == null)
        {
            $tag_list = [];
        }
        else {
            $tag_list = $request->input('tag_list');
        }

        $this->syncTags($post, $tag_list);

        $user = auth()->user();

        event (new PostWasUpdated($user, $post));

        return redirect()->route('admin.posts.index');
    }

    /**
     *  Search and deleted post from
     *  the specified storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws PostNotFoundException
     * @internal param $id
     */
    public function destroy(Post $post)
    {
        try
        {
            $post->delete();

        } catch (\Exception $e) {

            throw new PostNotFoundException($e->getMessage());
        }
        return redirect()->route('admin.posts.index');
    }





    /**
     * Assign the results of the PostRequest and assign
     * the user_id to publish the post.
     *
     * @param PostRequest $request
     * @return mixed
     */
    protected function createPost(PostRequest $request)
    {
        $user = auth()->user();

        $post = $user->posts()->create($request->all());

        $imageName = $post->id . '.' .
            $request->file('feat_image')->getClientOriginalExtension();

        $request->file('feat_image')->move(
            base_path() . '/public/images/posts/', $imageName
        );

        $user->recordActivity('created', $post);

        if($request->input('tag_pluck') == null){
            $tag_pluck = [];
        }
        else {
            $tag_pluck = $request->input('tag_pluck');
        }


        $this->syncTags($post, $tag_pluck);


        return $post;
    }

    /**
     * Sync the tags by passing in the Post object.
     *
     * @param Post $post
     * @param array $tags
     * @internal param Post $post
     * @internal param PostRequest $request
     */
    private function syncTags(Post $post, array $tags)
    {
        $post->tags()->sync($tags);
    }
}
