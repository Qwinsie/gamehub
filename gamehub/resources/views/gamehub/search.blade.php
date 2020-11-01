@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                @if (Auth::check())
                    Gamehub
                @else
                    Welcome to GameHub
                @endif
                    <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
            </div>
            <div class="container">
                @if(isset($details))
                    <h2> Results for: <b> {{ $query }} </b></h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Profile Picture</th>
                            <th>Name</th>
                            <th>Bio</th>
                            <th>Game</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $user)
                            <tr>
                                <td>
                                    @if($user->image)
                                        <img src="{{URL("/images/$user->image")}}" alt="Profile picture" width="100" height="100">
                                    @endif
                                </td>
                                <td><a href="{{ $user->path()}}">{{$user->name}}</td>
                                <td>{{$user->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @else
                    <p>There are no results</p>
                @endif
            </div>
        </div>
    </div>
@endsection
