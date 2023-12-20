<?php

namespace App\Http\Controllers;

use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        return view('images.index', [
            'images' => Image::paginate(10)
        ]);
    }
    public function show(Image $image){
        return view('images.show',[
            'image' => $image,
         ]);
    }
}
