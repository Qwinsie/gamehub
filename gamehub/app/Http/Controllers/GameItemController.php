<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class GameItemController extends Controller
{
    public function index()
    {
        $games = Game::orderBy();

        return view('game-item.index',compact('games'));
    }

    public function find($gameid)
    {
        $gameItems = User::where('gameid', $gameid)->firstOrFail();

        return view('game-items.index', [
            'gameItems' => $gameItems
    ]);
    }
}
