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
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <form action="{{ route('search')}}" method="POST" role="search">
                            @csrf
                            <div class="form-group row">
                                <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="user"
                                           placeholder="Search users">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Game" class="col-md-4 col-form-label text-md-right">{{ __('Game') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="game"
                                           placeholder="Search Game Name or Company">
                                </div>
                            </div>

                            <button type="submit" class="btn-primary btn btn-default">Search</button>

                        </form>
                    </div>
                </div>
            </div>
            <div>
                <a class="btn btn-primary m-3" href="{{route('game.create')}}">Add a new Game to the list</a>
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
                            <th>Likes</th>
                            <th>Dislikes</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($games as $game)
                        @php /** @var App\Models\Game $game */ @endphp
                        <tr>
                        @if($game->image)
                                <td><a href="{{ $game->path() }}"><img  src="{{URL("/images/games/$game->image")}}" alt="{{$game->name}}" width="100" height="100"></a></td>
                            @endif
                            <td>{{$game->name}}</td>
                            <td>{{$game->year}}</td>
                            <td>{{$game->company}}</td>
                            <td>
                                <a href="{{ $game->user->path() }}"><img  src="{{URL("/images/".$game->user->image)}}" alt="{{$game->user->name}}" width="30" height="30"></a>
                                <a href="{{ $game->user->path()}}">{{$game->user->name}}</a>
                            </td>
                            <td><a class="btn btn-primary" href="{{ $game->path() }}">Detail</a></td>
                            <td>
                                <form method="POST" action="gamehub/games/{{ $game->id}}/like">
                                    @csrf
                                    <button type="submit" class=" text-xs text-gray-500">
                                    <div class="flex items-center">
                                        <svg viewBox="0 0 20 20" class="mr-1 w-13" width="20">
                                        <g class="fill-current">
                                            <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                                        </g>
                                    </svg>
                                        {{$game->likes ?: 0}}
                                    </div>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="gamehub/games/{{ $game->id }}/like">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-gray-500">
                                    <div class="flex items-center ">
                                        <svg viewBox="0 0 20 20" class="" width="20">
                                        <g class="fill-current">
                                            <path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z" id="Fill-97"></path>
                                        </g>
                                        </svg>
                                        {{$game->dislikes ?: 0}}
                                    </div>
                                    </button>
                                </form>
                            </td>
                            <td>
                                @if (Auth::check())
                                    <div>{{ $game->isLikedBy(auth()->user()) ? ' You Liked this ': null}}</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
