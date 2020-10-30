<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = User::where('id', $id)->firstOrFail();
        if($profile === null){
            abort(404, "The profile you are looking for does not exist yet");
        }
        $games = Game::all()->where('user_id', $id);
        if($games === null){
            abort(404, "The game you are looking for does not exist yet");
        }

        return view('gamehub.profile.show', compact('profile'), compact('games'));
    }

    public function edit()
    {
        return view('gamehub.profile.edit');
    }

    public function store()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
