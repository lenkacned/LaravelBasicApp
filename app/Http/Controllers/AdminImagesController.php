<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminImagesController extends Controller
{
    public function index()
    {
        return view('admin.images.index');
    }

    public function create()
    {
        return view('admin.images.create');
    }

    public function store(Request $request)
    {

        //ddd(request()->file('image'));

        $path = $request->file('image')->store('images');

        return redirect('/')->with('success', 'Your image has been saved. Check storage directory.');
    }
}
