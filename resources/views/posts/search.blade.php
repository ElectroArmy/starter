@extends ('layouts.format')

@section('meta-title', 'Search Results')

@section ('content')

    <div class="form-blade">
        <div class="main-container">
            <div class="header">
                <h1 class="product--title">Search Results</h1>
            </div><!-- /.header -->

            <div class="posts-container">
                @if (count($posts) === 0)
                    <p class="offline">Sorry, no posts were found within your search.</p>
                @elseif (count($posts) >= 1)

                    @foreach($posts as $post)
                        <article class="recent-post animated zoomIn">
                            <h2><a href="{{ url('posts', $post->id) }}">{!!  $post->title !!}</a></h2>
                            <div id="featured-image">
                                <img src="{{ asset('images/catalog/' . $post->id. '.png') }}" class="featured" alt="A mug of beer">
                            </div><!-- /.featured-image -->
                            <div class="featured-content">
                                <div class="title">
                                    <p class="head">Article</p>
                                </div><!-- /.title -->
                                <h3><a class="box-header" href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></h3>

                                <p class="date">{!! date('d F, Y', strtotime($post->created_at)) !!}</p>
                         </article>
                    @endforeach
                @endif


            </div><!-- /.posts-container -->
        </div><!-- /.sign-container -->
    </div><!-- /.form-page -->

@stop

