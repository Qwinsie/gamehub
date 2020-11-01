@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Edit: {{ $game->name }}
                <a class="btn btn-primary" href="{{ $game->path() }}">Back to the Game</a>
            </div>
            <img src="{{URL("/images/games/$game->image")}}" alt="{{$game->name}}" width="200" height="200">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    </div>
                <form class="m-3" method="post" action="{{ route('game.update', $game->id)}}" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" class="form-control" value="{{$game->user->id}}" id="user_id" name="user_id"/>
                        @if($errors->has('user_id'))
                            <span class="alert-danger form-check-inline">{{$errors->first('user_id')}}</span>
                        @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $game->name }}"/>
                            @if($errors->has('name'))
                                <span class="alert-danger form-check-inline">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">Year:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="year" name="year" value="{{ $game->year }}"/>
                            @if($errors->has('year'))
                                <span class="alert-danger form-check-inline">{{$errors->first('year')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="company" class="col-md-4 col-form-label text-md-right">Company:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="company" name="company" value="{{ $game->company }}"/>
                            @if($errors->has('company'))
                                <span class="alert-danger form-check-inline">{{$errors->first('company')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                        <div class="col-md-6">
                            <input type="file" class="" name="image" value="{{ $game->image }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn-primary btn-block">Save Game</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
