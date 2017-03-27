<li>

    <p class="sidebar-body">{{ $comment->owner->name }} said..</p>

    <div class="body">
        {!! $comment->body !!}
    </div>

    @if(Auth::check())
        @include('admin.posts.comments.form', ['parentId' => $comment->id])
    @endif

    @if (isset($comments[$comment->id]))

        @include('admin.posts.comments.list', ['collection' => $comments[$comment->id]])

    @endif


</li>


