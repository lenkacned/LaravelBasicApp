<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create(){
        return view('sessions.create');
    } 

    public function store(){
        //validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]); 
        //attemp to authenticate and log in the user based on the provided credentials
        if(auth()->attempt($attributes)){
            //session fication as web attack tecnique
            session()->regenerate();
            return redirect('/')->with('success','Welcome Back!');
        }
        //auth failed
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
