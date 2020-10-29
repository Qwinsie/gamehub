@extends('layouts.layout')
@extends('layouts.app')

@section ('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{$profile->name}}
            </div>

            <div class="links">
                <a href="{{route('gamehub.index')}}">Homepage</a>
            </div>
            <div>
                <table>
                    <tr>
                        <td><img src="{{$profile->image}}" alt="Profile picture"></td>
                        <td>{{$profile->name}}</td>
                        <td>{{$profile->email}}</td>
                        <td><a href="edit/{{$profile->id}}">Edit</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
