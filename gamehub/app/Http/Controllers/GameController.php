<?php

namespace App\Http\Controllers;

use App\Models\Game;
use DB;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('created_at','desc')->get();

        return view('gamehub.index',compact('games'));
    }

    public function show(Game $game)
    {
        return view('gamehub.show',compact('game'));
    }

    public function create()
    {
        return view('gamehub.create',);
    }

    public function store()
    {
        Game::create($this->validateGame());

        return redirect(route('gamehub.index'))->with('success', 'Game has been successfully saved to your list!');
    }

    public function edit(Game $game)
    {
        return view('gamehub.edit', compact('game'));
    }

    public function update(Game $game)
    {
        $game->update($this->validateGame());

        return redirect(route('game.show', compact('game')));
    }

    protected function validateGame()
    {
        return request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'year' => 'required',
            'company' => 'required',
            'image' => 'required'
        ]);
    }

    public function delete(Game $game)
    {
        $game->delete();

        return redirect(route('gamehub.index'))->with('success', 'Game has been successfully deleted from your list!');
    }
}
