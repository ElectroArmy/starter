<article class="col-md-8">
    <h1><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></h1>
    <div class="body"> 
        <h2>{!! $post->body !!}</h2>  
        {!! date('d F, Y', strtotime($post->created_at)) !!} 
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="mdash"></span>        <a href="{{ url('/users', $user->name) }}">{!! $user->name !!}</a> 
        <span class="mdash">—</span>  
        @include('partials/favourite-button')
        {!! $post->comments()->count() !!}  
            @if (count($post->comments)) 
                @foreach($post->comments as $comment) 
                    <em>Comment</em> 
                    <a href="{{ url('/posts', $post->id) }}">{{ $comment->body }}</a>                                                   @endforeach 
            @else 
                <em>Comments</em> 
            @endif 
    </div>


</article>

