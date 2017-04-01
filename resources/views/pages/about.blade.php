@extends('layouts.format')

@section('meta-title', 'About Us')

@section('content')



<div class="main-container">
    <div class="header">
        <h1 class="form--title is--beige">About us</h1>
    </div><!-- /.header -->

   <div class="game-banner animated zoomInDown">
        <img src="/images/about.png" class="games" alt="A picture of a games console">
        <img src="/images/blue_game.png" class="games" alt="A picture of a blue games console">
        <img src="/images/oculus.png" class="games" alt="Someone playing a game with an oculus console">
    </div><!-- /.game-banner -->

    <div class="static-container">
        <div class="left-side">
            <h2 class="is--beige">Who we are?</h2>
            <p class="is--beige">We are quintessentially a games enthusiast web app, and we provide you with the latest deals on computer gaming. We pull together a wide range of game expertise within the industry. We have a number of future on going endeavours in which we delve in the the development of various level gamers across the world in our exclusive blog. Join us and level up on your knowledge of level gamers. </p>
            <p class="is--beige">We are quintessentially a games enthusiast web app, and we provide you with the latest deals on computer gaming. We pull together a wide range of game expertise within the industry. We have a number of future on going endeavours in which we delve in the the development of various level gamers across the world in our exclusive blog. Join us and level up on your knowledge of level gamers. </p>

        </div><!-- /.left-side -->

        <div class="right-side">
            <h2 class="is--beige">What we do</h2>
            <p class="is--beige">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </p>
            <p class="is--beige">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </p>
        </div><!-- /.right-container -->
    </div><!-- /.static-container -->

    <div class="bottom-container">
        <button class="btn-default"><a href="{{ route('home') }}">Home</a></button>
    </div><!-- /.bottom-container -->



</div><!-- /.main-container -->



@endsection