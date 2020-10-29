@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                @if (Auth::check())
                    Hi {{ Auth::user()->name }}
                @else
                    Welcome to GameHub
                @endif
            </div>

            <div class="links">
                <a href="{{route('game.create')}}">Create a new Game</a>
                <a href="{{route('about.index')}}">About Us</a>
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
                        <td><a href="{{ $game->user->path()}}">{{$game->user->name}}</a></td>
                        <td><a href="{{ $game->path() }}">Detail</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
