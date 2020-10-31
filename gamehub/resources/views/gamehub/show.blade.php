@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{$game->name}}
            </div>
            <div>
                <img src="{{URL("/images/games/$game->image")}}" alt="{{$game->name}}" >
                <div>{{$game->name}}</div>
                {{$game->year}}
                {{$game->company}}
                <a href="{{ $game->user->path()}}">{{$game->user->name}}</a>
                @can('edit-game', $game)
                <a href="{{ route('game.edit', $game->id)}}">Edit</a>
                <a href="{{ route('game.delete', $game->id)}}">Delete</a>
                @endcan
            </div>
        </div>
    </div>
@endsection
