<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

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

     public function update(Requests\UpdateProfileRequest $request, User $profile) {
    	$profile->name = $request->name;
    	$profile->lastname = $request->lastname;
    	$profile->save();
        $profile->last_activity()->create([
            'type' => 'profile',
            'place_id' => $profile->id
        ]);
    	return redirect()->back()->withSuccess('Profils tika veiksmīgi izlabots!');
    }
}
