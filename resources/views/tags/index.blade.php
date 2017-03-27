@extends ('layouts.format')

@section('meta_description')

@section ('content')
    <div class="form-blade">
        <div class="main-container">
            <div class="section hero is-primary">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">Tags</h1><!-- /.title -->
                        <p class="subtitle">
                            Every tag on the site.
                        </p><!-- /.subtitle -->
                    </div><!-- /.container -->
                </div><!-- /.hero-body -->
            </div><!-- /.section hero -->

            <div class="section">
                <div class="container">
                    <ul class="has-columns">
                        @foreach($tags as $letter => $tagCollection)
                            <div class="letter-group">
                                <h3 class="title is-1 letter">
                                    {{ $letter }}
                                </h3><!-- /.title is-1 letter -->

                                <ul>
                                    @foreach($tagCollection as $tag)
                                        <li class="title is-5">
                                            <a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a>
                                        </li><!-- /.title is-5 -->
                                    @endforeach
                                </ul>
                            </div><!-- /.letter-group -->
                        @endforeach
                    </ul>
                </div><!-- /.container -->
            </div><!-- /.section -->
        </div><!-- /.main-container -->
    </div><!-- /.form-blade -->

@stop




