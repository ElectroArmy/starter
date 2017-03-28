@extends ('layouts.format')

@section('meta-title', 'The Station Blog')

@section('body_class', 'join')

@section ('content')
    <div class="main-container">
        <div class="content">
            <div class="heading is--padded-bottom">
                <h1>The Station Blog  <small>the Latest</small></h1>
            </div><!-- /.heading -->

                <div class="posts-container animated fadeInUp">
                    @forelse ($posts as $post)
                        @if($post->id == 1)
                            <article class="recent-post animated zoomIn">
                                <a href="{{ url('admin/posts', $post->id) }}">
                                    <div id="featured-image">
                                        <img src="{{ asset('images/posts/' . $post->id. '.png') }}" class="featured" alt="The uploaded featured image">
                                    </div><!-- /.featured-image -->

                                    <div class="featured-content">
                                        <div class="title">
                                            <p class="head">Article</p>
                                        </div><!-- /.title -->
                                        <h3><a class="box-header" href="{{ url('admin/posts', $post->id) }}">{{ $post->title }}</a></h3>
                                        <p class="is--black">By <a href="{{ route('profile', [Auth::user()->username])  }}">{{ $user->name }}</a></p>

                                        <p class="date is--black">{!! date('d F, Y', strtotime($post->created_at)) !!}</p>
                                    </div><!-- /.featured-content -->
                                </a>
                            </article>
                        @endif

                        @if($post->id == 2)
                            <article class="recent-post animated zoomIn">
                                <a href="{{ url('admin/posts', $post->id) }}">
                                    <div id="featured-image">
                                        <img src="{{ asset('images/posts/' . $post->id. '.png') }}" class="featured" alt="The uploaded featured image">
                                    </div><!-- /.featured-image -->

                                    <div class="featured-content">
                                        <div class="title">
                                            <p class="head">Article</p>
                                        </div><!-- /.title -->
                                        <h3><a class="box-header" href="{{ url('admin/posts', $post->id) }}">{{ $post->title }}</a></h3>
                                        <p class="is--black">By <a href="{{ route('profile', [Auth::user()->username])  }}">{{ $user->name }}</a></p>

                                        <p class="date is--black">{!! date('d F, Y', strtotime($post->created_at)) !!}</p>
                                    </div><!-- /.featured-content -->
                                </a>
                            </article>
                        @endif

                        @if($post->id == 3)
                            <article class="recent-post animated zoomIn">
                                <a href="{{ url('admin/posts', $post->id) }}">
                                    <div id="featured-image">
                                        <img src="{{ asset('images/posts/' . $post->id. '.png') }}" class="featured" alt="The uploaded featured image">
                                    </div><!-- /.featured-image -->

                                    <div class="featured-content">
                                        <div class="title">
                                            <p class="head">Article</p>
                                        </div><!-- /.title -->
                                        <h3><a class="box-header" href="{{ url('admin/posts', $post->id) }}">{{ $post->title }}</a></h3>
                                        <p>By <a class="is--black" href="{{ route('profile', [Auth::user()->username])  }}">{{ $user->name }}</a></p>

                                        <p class="date">{!! date('d F, Y', strtotime($post->created_at)) !!}</p>
                                    </div><!-- /.featured-content -->
                                </a>
                            </article>
                        @endif

                        @if($post->id == 4)
                            <article class="recent-post animated zoomIn">
                                <a href="{{ url('admin/posts', $post->id) }}">
                                    <div id="featured-image">
                                        <img src="{{ asset('images/posts/' . $post->id. '.png') }}" class="featured" alt="The uploaded featured image">
                                    </div><!-- /.featured-image -->

                                    <div class="featured-content">
                                        <div class="title">
                                            <p class="head">Article</p>
                                        </div><!-- /.title -->
                                        <h3><a class="box-header" href="{{ url('admin/posts', $post->id) }}">{{ $post->title }}</a></h3>
                                        <p>By <a class="is--black" href="{{ route('profile', [Auth::user()->username])  }}">{{ $user->name }}</a></p>

                                        <p class="date">{!! date('d F, Y', strtotime($post->created_at)) !!}</p>
                                    </div><!-- /.featured-content -->
                                </a>
                            </article>
                        @endif
                    @empty
                        <p class="offline">No posts at the moment.</p>
                    @endforelse

                </div><!-- /.posts-container -->




        </div><!-- /.content -->
<</div><!-- /.main-container -->
@stop

