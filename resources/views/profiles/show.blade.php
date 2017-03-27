@extends('layouts.format')

@section('meta-title', 'Show your profile')

@section('content')

<div class="main-container">
       <div class="profile-container">
            @if(isset($user->profile))
                <div class="header">
                    <h1 class="form--title is--beige">{{ $user->username }}'s Profile <small>{{ $user->profile->location }}</small></h1>
                </div><!-- /.header -->

            <div class="row">
                <div class="profile--body">
                    <p class="bio--body">
                        Biography:  {{ $user->profile->bio }}
                    </p>

                    <ul class="profile--links">
                        <li>{!! link_to('http:://twitter.com' . $user->profile->twitter_username, 'Find Me On Twitter') !!}</li>
                        <li>{!! link_to('http:://github.com' . $user->profile->github_username, 'View My Work On Github') !!}</li>
                        <li><a href="{{ route('activity',  [Auth::user()->username], '/activity') }}">Activity</a></li>

                    </ul>

                    @if ($user->isCurrent())
                        <ul class="profile--links">
                            <li>{!! link_to_route('profile.edit', 'Edit Your Profile', $user->username) !!}</li>
                        </ul>
                    @endif
                </div>
            </div><!-- /.row -->
            @else
                <div class="no-profile">
                    <h2 class="form--title --centre is--beige">We do not have a profile for this user </h2>
                    <p class="make-profile --centre">{!! link_to_route('profile.create','Create Your Profile', $user->profile) !!}</p>
                </div>
            @endif

        </div><!-- /.profile-container -->

</div><!-- /.main-container -->
@endsection

