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
                        <td>Likes</td>
                        <td>Dislikes</td>
                    </tr>
                    @foreach($games as $game)
                        @php /** @var App\Models\Game $game */ @endphp
                    <tr>
                        @if($game->image)
                            <td><img src="{{URL("/images/games/$game->image")}}" alt="{{$game->name}}" width="200" height="200"></td>
                        @endif
                        <td>{{$game->name}}</td>
                        <td>{{$game->year}}</td>
                        <td>{{$game->company}}</td>
                        <td><a href="{{ $game->user->path()}}">{{$game->user->name}}</a></td>
                        <td><a href="{{ $game->path() }}">Detail</a></td>
                        <td>
                            <form method="POST" action="gamehub/games/{{ $game->id}}/like">
                                @csrf
                                @method('DELETE')
                                <div class="flex items-center">
                                    <svg viewBox="0 0 20 20" class="text-gray-500 mr-1 w-13" width="20">
                                        <g class="fill-current">
                                            <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                                        </g>
                                    </svg>

                                    <button type="submit" class="text-xs text-gray-500">{{$game->likes ?: 0}}</button>
                                </div>

                                <div class="flex items-center ">
                                    <svg viewBox="0 0 20 20" class="" width="20">
                                        <g class="fill-current">
                                            <path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z" id="Fill-97"></path>
                                        </g>
                                    </svg>

                                    <button type="submit" class="text-xs text-gray-500">{{$game->dislikes ?: 0}}</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
