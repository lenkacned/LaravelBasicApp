<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required' 
        ]);
        //apply hashing algorithm for password
        $user = User::create($attributes);

        //log the user in
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
