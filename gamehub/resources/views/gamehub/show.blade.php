@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{$game->name}}
                <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                @can('edit-game', $game)
                    <a class="btn btn-primary" href="{{ route('game.edit', $game->id)}}">Edit</a>
                    <a class="btn btn-primary" href="{{ route('game.delete', $game->id)}}">Delete</a>
                @endcan
            </div>
            Created by: <a href="{{ $game->user->path()}}">{{$game->user->name}}</a>
            <div>
                <img class="m-3" src="{{URL("/images/games/$game->image")}}" alt="{{$game->name}}" width="200" height="200">
                <div>
                {{$game->year}}
                {{$game->company}}
                </div>
            </div>
        </div>
    </div>
@endsection
