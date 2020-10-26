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
                {{$game->name}}
            </div>

            <div class="links">
                <a href="{{route('gamehub.index')}}">Homepage</a>
            </div>
            <div>
                <table>
                    <tr>
                        <td><img src="{{$game->image}}" alt=""></td>
                        <td>{{$game->name}}</td>
                        <td>{{$game->year}}</td>
                        <td>{{$game->company}}</td>
                        <td>{{$game->user_id}}</td>
                        <td><a href="edit/{{$game->id}}">Edit</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
