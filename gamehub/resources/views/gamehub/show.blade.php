@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{$game->name}}
            </div>
            <div>
                <table>
                    <tr>
                        <td><img src="{{$game->image}}" alt="Profile picture"></td>
                        <td>{{$game->name}}</td>
                        <td>{{$game->year}}</td>
                        <td>{{$game->company}}</td>
                        <td>{{$game->user->name}}</td>
                        <td><a href="{{ route('game.edit', $game->id)}}">Edit</a></td>
                        <td><a href="{{ route('game.delete', $game->id)}}">Delete</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
