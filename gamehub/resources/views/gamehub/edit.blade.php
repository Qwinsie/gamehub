@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Edit: {{ $game->name }}
            </div>
            <div>
                <form method="post" action="{{ route('game.update', $game->id)}}" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" class="form-control" value="{{$game->user->id}}" id="user_id" name="user_id"/>
                        @if($errors->has('user_id'))
                            <span class="alert-danger form-check-inline">{{$errors->first('user_id')}}</span>
                        @endif
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $game->name }}"/>
                        @if($errors->has('name'))
                            <span class="alert-danger form-check-inline">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ $game->year }}"/>
                        @if($errors->has('year'))
                            <span class="alert-danger form-check-inline">{{$errors->first('year')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{ $game->company }}"/>
                        @if($errors->has('company'))
                            <span class="alert-danger form-check-inline">{{$errors->first('company')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="" name="image" value="{{ $game->image }}"/>
                    </div>
                    <button type="submit" class="btn-primary btn-block">Save Game</button>
                </form>
            </div>
        </div>
    </div>
@endsection
