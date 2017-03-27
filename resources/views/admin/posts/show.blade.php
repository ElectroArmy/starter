@extends('layouts.format')

@section('meta-title', $post->title)

@section('meta_description', strip_tags($index))

@section('content')


<div class="main-container">

    <div class="pre-article">
        <div id="featured-image">
            <img src="{{ asset('images/posts/' . $post->id. '.png') }}" class="featured" alt="The uploaded featured image">
        </div><!-- /.featured-image -->
        <h1 class="form--title is--beige"> {!! $post->title !!}</h1>
        <p class="published--at"><i class="fa fa-clock-o" aria-hidden="true"></i>
            Created on: {!! date('F d, Y', strtotime($post->created_at)) !!} </p>
        <p class="published--at">Written by <small>Sehinde Raji</small></p>
    </div><!-- /.pre-article -->


    <div class="article-container">
                <div class="left-container">
                    <p class="is--beige">{!! $post->body !!}</p>


                </div><!-- /.left-container -->
                <div class="right-container">
                    <div class="comment-box">
                        <h3 class="sidebar-title">Comments</h3>

                            @if(isset($comments['root']))
                                @include('admin.posts.comments.list', ['collection' => $comments['root']])
                                    <h3 class="sidebar-items"> Leave a Reply</h3>
                                        @include('admin.posts.comments.form')
                            @else
                                <p class="sidebar-comments">No Historical Comments Today</p>
                                <h3 class="sidebar-title">Leave a Reply</h3>
                                @include('admin.posts.comments.form')

                            @endif
                    </div><!-- /.comment-box -->

                <div class="tag-box">
                    @unless($post->tags->isEmpty())
                        <h2 class="side-heading">Tags:</h2>
                        <ul class="tag--centre">
                            @foreach($post->tags as $tag)

                                <a href="{{ url('/posts', $post->id) }}"><button class="btn-tag">{{ $tag->name }}</button></a>

                            @endforeach
                        </ul>
                    @endunless
                </div><!-- /.tag-box -->
        </div><!-- /.right-container -->
    </div><!-- /.article-container -->


    <div class="button-container">
        <div class="previous">
            @if(isset($previous))
                @if($previous)
                    <a href="{{ URL::to( '/admin/blogs/' . $previous->id ) }}"><i class="fa fa-long-arrow-left fa-3x" aria-hidden="true"></i></a>
                @endif
            @else

            @endif
        </div><!-- /.left -->

        <div class="centre">
           <button class="btn-default"><a href="{{ route('admin.posts.edit',[$post->id]) }}">Edit Post</a></button>
        </div><!-- /.centre -->

        <div class="next">
            @if(isset($next))
                @if($next)
                    <a href="{{ URL::to( '/admin/blogs/' . $next->id ) }}"><i class="fa fa-long-arrow-right fa-3x" aria-hidden="true"></i></a>
                @endif
            @else

            @endif
        </div><!-- /.right -->

    </div><!-- /.button-container -->


</div><!-- /.main-container -->



@stop

