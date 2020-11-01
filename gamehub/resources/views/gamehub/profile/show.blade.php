@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                @if($profile->image)
                    <img src="{{URL("/images/$profile->image")}}" alt="Profile picture" width="200" height="200">
                @endif
                {{$profile->name."'s Profile"}}
                @can('edit-profile', $profile)
                    <a class="btn btn-primary" href="{{route('profile.edit', $profile->id)}}">Edit</a>
                @endcan
            </div>
            <div>
                {{$profile->description}}
            </div>
            <div>
                @can('edit-profile', $profile)
                <a class="btn btn-primary m-3" href="{{route('game.create')}}">Add a new Game to your list</a>
                @endcan
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Company</th>
                            <th>User</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                            @php /** @var App\Models\Game $game */ @endphp
                            <tr>
                                <td><a href="{{ $game->path() }}"><img src="{{URL("/images/games/$game->image")}}" alt="{{$game->name}}" width="100" height="100"></td>
                                <td>{{$game->name}}</td>
                                <td>{{$game->year}}</td>
                                <td>{{$game->company}}</td>
                                <td><a href="{{ $game->user->path()}}">{{$game->user->name}}</a></td>
                                <td><a class="btn btn-primary" href="{{ $game->path() }}">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
