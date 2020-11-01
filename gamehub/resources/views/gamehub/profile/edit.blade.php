@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Edit: {{ $profile->name }}
            </div>

            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Fill in the fields</h4></div>
                    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="col-md-6">
                                <input id="name" placeholder="{{$profile->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')  }}" autocomplete="name">
                                @if($errors->has('name'))
                                    <span class="alert-danger form-check-inline">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" placeholder="{{$profile->description ?: 'This is my Bio...'}}" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                    <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                        </div>



                        <div class="panel-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('profile picture') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="image" class="">
                                @if($errors->has('image'))
                                    <span class="alert-danger form-check-inline">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn-primary btn-block">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
