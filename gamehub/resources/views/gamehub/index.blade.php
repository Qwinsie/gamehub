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
                GameHub
            </div>

            <div class="links">
                <a href="{{route('about.index')}}">About Us</a>
                <a href="{{route('game.create')}}">Create a new Game</a>
            </div>
            <div>
                    <table>
                        <tr>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Year</td>
                            <td>Company</td>
                            <td>User</td>
                            <td>Detail</td>
                        </tr>
                        @foreach($games as $game)
                            @php /** @var App\Models\Game $game */ @endphp
                        <tr>
                            <td><img src="{{$game->image}}" alt=""></td>
                            <td>{{$game->name}}</td>
                            <td>{{$game->year}}</td>
                            <td>{{$game->company}}</td>
                            <td>{{$game->user->username}}</td>
                            <td><a href="{{ $game->path() }}">Detail</a></td>
                        </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@endsection
