<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameLikesController extends Controller
{
    public function storeLike(Game $game)
    {

        $game->like(Auth::user());

        return back();
    }

    public function  destroy(Game $game)
    {

        $game->dislike(Auth::user());

        return back();
    }
}
