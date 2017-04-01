@extends('layouts.format')


@section('content')

    <div class="header">
        <h1 class="form--title is--beige">Our Community</h1>
    </div><!-- /.header -->
    <div class="row">
        <div class="col-md-8">
                <h4 class="com--links">
                        <a href="/community">Community Links & Votes</a>
                        @if ($channel->exists)
                            <span>&mdash; {{ $channel->title }}</span>
                        @endif
                </h4>

                    <ul class="nav nav-tabs">
                        <li class="{{ request()->exists('popular') ? '' : 'active' }}">
                            <a href="{{ request()->url() }}">Most Recent</a>
                        </li>

                        <li class="{{ request()->exists('popular') ? 'active' : '' }}">
                            <a href="?popular">Most Popular</a>
                        </li>
                    </ul>

                      @include('community.list')
                </div><!-- /.col-md-8 -->

                @include('community.add-link')


        </div><!-- /.row -->


@stop

