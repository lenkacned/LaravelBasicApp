<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Image;

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

        //validate input
        $attributes = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:images,slug',
            'image' => 'required|image'
        ]);

        //store image
            try{            
                $attributes['image'] = $request->file('image')->store('images', 'public');
            } catch (Exception $e){
                throw ValidationException::withMessages([
                    'email' => 'Your image could not be uploaded.']);
            }
        //create image
        Image::create($attributes);
        return redirect('/')
                ->with('success', 'Your image is saved!');
        }
}
