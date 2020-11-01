<?php

namespace App\Http\Controllers;

use App\Models\Game;
use DB;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::withLikes()->get();

        return view('gamehub.index',compact('games'), );
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

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images/games'), $imageName);

        $this->validateGame();

        Game::create([
            'user_id' => request('user_id'),
            'name' => request('name'),
            'year' => request('year'),
            'company' => request('company'),
            'image' => $imageName,
        ]);

            return redirect(route('gamehub.index'))->with('success', 'Game has been successfully saved to your list!');
    }

    public function edit(Game $game)
    {
        return view('gamehub.edit', compact('game'));
    }

    public function update(Game $game)
    {
        if(request()->image) {

            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images/games'), $imageName);

            $game->update([
                'image' => $imageName,
            ]);
        }

        $game->update($this->validateGame());

        return redirect(route('game.show', compact('game')));
    }

    protected function validateGame()
    {
        return request()->validate([
            'user_id' => 'required',
            'name' => ['unique:games', 'required','string','max:50'],
            'year' => ['required','string', 'min:4','max:4'],
            'company' => 'required',
        ]);
    }

    public function delete(Game $game)
    {
        $game->delete();

        return redirect(route('gamehub.index'))->with('success', 'Game has been successfully deleted from your list!');
    }
}
