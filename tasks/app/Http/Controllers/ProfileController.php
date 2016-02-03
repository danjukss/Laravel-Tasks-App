<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class ProfileController extends Controller
{
    //
    public function __construct() {
    	 $this->middleware('auth');
    }

    public function edit() {
    	$user = Auth::user();
    	return view('profile.edit', compact('user'));
    }

     public function update(Requests\UpdateProfileRequest $request, $id) {
    	$user = $request->user();

    	$user->name = $request->name;
    	$user->lastname = $request->lastname;

    	$user->save();

        $user->last_activity()->create([
            'type' => 'profile',
            'place_id' => $user->id
        ]);

    	$request->session()->flash('update_profile', "Profils tika veiksmīgi izlabots!");
    	return redirect('/profile/' . $id . '/edit');
    }
}
