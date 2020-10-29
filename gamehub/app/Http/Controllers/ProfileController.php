<?php

namespace App\Http\Controllers;

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
        return view('gamehub.profile.show',compact('profile'));
    }
}
