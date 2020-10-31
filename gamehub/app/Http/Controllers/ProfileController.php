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

    public function edit(User $profile)
    {
        $this->authorize('edit-profile', $profile);
        return view('gamehub.profile.edit', compact('profile'));
    }

    public function update(User $profile)
    {
        $this->authorize('edit-profile', $profile);
        if(request()->image) {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $imageName);

            $profile->update([
                'image' => $imageName,
            ]);
        }

        if(request()->name){
            $profile->update(request()->validate([
                'name' => ['required','string', 'min:5','max:25'],
            ]));
        }

        if(request()->description) {
            $profile->update(request()->validate([
                'description' => ['required','max:255'],
            ]));
        }
        return redirect(route('profile.show', compact('profile')));
    }

}
