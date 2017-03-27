
@if (isset($latest))

    <div class="search__Box">
        {!! Form::open(['method' => 'GET']) !!}
        {!! Form::input('search', 'q', null, ['class' => 'search','placeholder' => 'Search Posts']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.search__Box -->
    <hr/>
    <!-- sidebar nav -->
    <h3>Recent Posts</h3>
    <h4><a href="{{ url('/posts', $post->id) }}">{{ $latest->title }}</a></h4>
    <p>by
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        {{ $user->name }}
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
        {!! $post->created_at !!}</p>
    <hr/>

    <h3>Most Active Posts</h3>
    <h4><a href="{{ url('/posts') }}">{{ $latest->body }}</a></h4>
    <p>by
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        {{ $user->name }} <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
        {!! $post->created_at !!}</p>
    <hr/>



    <h3>From the Archive</h3>
    @foreach ($posts_by_date as $date => $posts)
        <h3>{{ $date }}</h3>
        @foreach ($posts as $post)
            <h4><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></h4>
            <p>by
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                {{ $user->name }} <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                {!! $post->created_at !!}</p>
        @endforeach
    @endforeach

    <br/>
    <br/>
@else
    'Sorry no posts today'
@endif