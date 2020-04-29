<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(User $user){
        $this->authorize('update',$user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update($user){
        $data = request()->validate([
            'phonenumber'=> ['required', 'numeric'] ,
            'country'=>['required', 'string', 'max:255'],
            'city'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'zipcode'=>['required', 'digits:5'],

        ]);

        $name = request()->validate([
            'name'=>['required', 'string', 'max:255'],
        ]);

        auth()->user()->profile->update($data);
        auth()->user()->update($name);

        return redirect("/");
    }
}