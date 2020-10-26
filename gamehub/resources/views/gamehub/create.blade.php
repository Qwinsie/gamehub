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
                Add a game to your list!
            </div>

            <div class="links">
                <a href="{{route('gamehub.index')}}">Homepage</a>
            </div>
            <div>
                <form method="post" action="{{ route('game.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"/>
                        @if($errors->has('name'))
                            <span class="alert-danger form-check-inline">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="text" class="form-control" id="year" name="year"/>
                        @if($errors->has('year'))
                            <span class="alert-danger form-check-inline">{{$errors->first('year')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input type="text" class="form-control" id="company" name="company"/>
                        @if($errors->has('company'))
                            <span class="alert-danger form-check-inline">{{$errors->first('company')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image URL:</label>
                        <input type="text" class="form-control" id="image" name="image"/>
                    </div>
                    <button type="submit" class="btn-primary btn-block">Save Game</button>
                </form>
            </div>
        </div>
    </div>
@endsection
