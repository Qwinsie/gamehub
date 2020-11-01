<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SearchController extends Controller
{

    public function search()
    {
        $username = request('user');
        $gameinfo = request('game');
        $user = User::where ( 'name', 'LIKE', '%' . $username . '%' )->get ();
        $game = Game::where ( 'company', 'LIKE', '%' . $gameinfo . '%' )->orWhere('name', 'LIKE', '%' . $gameinfo . '%')->get ();

        if (count ($user) > 0) {
            if (count ($game) > 0) {
                return view('gamehub.search')->withDetails($user, $game)->withQuery($username, $gameinfo);
            }
            return view('gamehub.search')->withDetails($user)->withQuery($username);
        } else {
        return view ( 'gamehub.search' )->withMessage ( 'No Details found. Try to search again !' );
        }
    }
}
