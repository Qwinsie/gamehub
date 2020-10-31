@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Add a game to your list!
            </div>
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h6>Fill in the fields</h6></div>
                <form method="post" action="{{ route('game.store') }}" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden"
                               class="form-control"
                               value="{{ Auth::user()->id }}"
                               id="user_id"
                               name="user_id"/>
                        @if($errors->has('user_id'))
                            <span class="alert-danger form-check-inline">{{$errors->first('user_id')}}</span>
                        @endif
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                        <div class="col-md-6">
                            <input type="text"
                                    class="form-control"
                                    required
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"/>
                            @if($errors->has('name'))
                                <span class="alert-danger form-check-inline">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('year') }}</label>
                        <div class="col-md-6">
                            <input type="text"
                                   class="form-control"
                                   required
                                   id="year"
                                   name="year"
                                   value="{{ old('year') }}"/>
                            @if($errors->has('year'))
                                <span class="alert-danger form-check-inline">{{$errors->first('year')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('company') }}</label>
                        <div class="col-md-6">
                            <input type="text"
                                   class="form-control"
                                   required id="company"
                                   name="company"
                                   value="{{ old('company') }}"/>
                            @if($errors->has('company'))
                                <span class="alert-danger form-check-inline">{{$errors->first('company')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-6">
                            <input type="file" class="" name="image"/>
                            @if($errors->has('image'))
                                <span class="alert-danger form-check-inline">{{$errors->first('image')}}</span>
                            @endif
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
