@extends('layouts.format')

@section('meta-title', $post->title)

@section('meta_description', strip_tags($index))

@section('content')
  <div class="main-container">
        <h1 class="blog--title"> {!! $post->title !!}</h1>
        <p class="published--at"><i class="fa fa-clock-o" aria-hidden="true"></i>
            Created on: {!! date('F d, Y', strtotime($post->created_at)) !!} </p>
        <p class="published--at">Written by <small>Sehinde Raji</small></p>

        <div class="article-container">
            <div class="left-container">
                <p class="is--beige">{!! $post->body !!}</p>


            </div><!-- /.left-container -->
            <div class="right-container">
                <div class="comment-box">
                    <h3 class="sidebar-title">Comments</h3>
                    <p class="sidebar-para">Please login to view comments</p>
                </div>
                    <!-- /.comment-box -->


                <div class="tag-box">
                    @unless($post->tags->isEmpty())
                        <h2 class="side-heading">Tags:</h2>
                        <ul class="tag--centre">
                            @foreach($post->tags as $tag)
                                <a href="{{ url('/posts', $post->id) }}"><i class="fa fa-tag" aria-hidden="true"></i>
                                    <button class="btn-tag">{{ $tag->name }}</button></a>
                            @endforeach
                        </ul>
                    @endunless
                </div><!-- /.tag-box -->
            </div><!-- /.right-container -->
        </div>
        <!-- /.article-container -->



        <div class="button-container">
            <div class="previous">
                @if(isset($previous))
                    @if($previous)
                        <a href="{{ URL::to( 'blogs/' . $previous->id ) }}"><i class="fa fa-long-arrow-left fa-3x" aria-hidden="true"></i></a>
                    @endif
                @else

                @endif
            </div><!-- /.left -->

            <div class="centre">
                <button class="btn-default"><a href="{{ route('contact') }}">Contact Us</a></button>
            </div><!-- /.centre -->

            <div class="next">
                @if(isset($next))
                    @if($next)
                        <a href="{{ URL::to( 'blogs/' . $next->id ) }}"><i class="fa fa-long-arrow-right fa-3x" aria-hidden="true"></i></a>
                    @endif
                @else

                @endif
            </div><!-- /.right -->

        </div><!-- /.button-blog -->







    </div><!-- /.main-container -->



@stop
