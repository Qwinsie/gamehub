<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('created_at','desc')->get();

        return view('gamehub.index',compact('games'));
    }

    public function show($id)
    {
        $game = Game::where('id', $id)->firstOrFail();
        if($game === null){
            abort(404, "The game you are looking for does not exist yet");
        }
        return view('gamehub.show',compact('game'));
    }

    public function create()
    {
        return view('gamehub.create',);
    }

    public function store()
    {
        Game::create($this->validateGame());

        return redirect('gamehub.index')->with('success', 'Game has been successfully saved to your list!');
    }

    public function update(Game $game)
    {
        Game::update(request()->validate());

        return redirect($game->path());
    }

    protected function validateGame()
    {
        return request()->validate([
            'name' => 'required',
            'year' => 'required',
            'company' => 'required',
            'image' => 'required'
        ]);
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }
}
