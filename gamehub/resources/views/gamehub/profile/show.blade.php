@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{$profile->name."'s Profile"}}
            </div>
            <div>
                @if($profile->image)
                    <img src="{{URL("/images/$profile->image")}}" alt="Profile picture" width="200" height="200">
                @endif
                    {{$profile->name}}
                    {{$profile->email}}
                    {{$profile->description}}
                    @can('edit-profile', $profile)
                    <a href="{{route('profile.edit', $profile->id)}}">Edit</a>
                    @endcan
            </div>

            <div>
                <a class="btn btn-primary" href="{{route('game.create')}}">Add a new Game to the list</a>
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
                            <td><img src="{{URL("/images/games/$game->image")}}" alt="{{$game->name}}" width="100" height="100"></td>
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
