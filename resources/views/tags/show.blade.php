@extends ('layouts.format')

@section('meta_description')

@section ('content')
<div class="form-blade">
    <div class="main-container">
        <div class="header">
            <h1 class="product--title">Tag Results</h1>
        </div><!-- /.header -->

        @if (count($posts) === 0)
            <div class="section hero is-primary">
                <div class="hero-body">
                    <div class="container">
                        <p class="offline">Sorry, no tags were found today.</p>
                    </div><!-- /.container -->
                </div><!-- /.hero-body -->
            </div><!-- /.section hero -->


        @elseif (count($posts) >= 1)
            @foreach($posts as $post)
                <article>
                    <h2><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></h2>
                    <div class="body">{{ $post->body }} </div>
                </article>
            @endforeach
        @endif

    </div>
</div>

@stop


