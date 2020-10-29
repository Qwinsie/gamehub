@extends('layout.layout')

@section ('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                About Us
            </div>

            <div class="links">
                <a href="{{route('gamehub.index')}}">Homepage</a>
            </div>
            <div>
              <h2>What is GameHub?</h2>
                <p>
                    GameHub is an online platform where you can list your owned games and view games of others.
                </p>
            </div>
        </div>
    </div>
@endsection
