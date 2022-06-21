<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Registration form page
    public function register()
    {
        return view('users.register');
    }

    //Store New User Data
    public function store(Request $request) 
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
           // 'password' => 'required|confirmed|min:6' // another way to write this
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create New User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
