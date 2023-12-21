<?php

namespace App\Http\Controllers;

use App\Models\Image;

class ImageController extends Controller
{
    //Show images
    public function index()
    {
        return view('images.index', [
            'images' => Image::paginate(10)
        ]);
    }
    
    //Show single image
    public function show(Image $image){
        return view('images.show',[
            'image' => $image,
         ]);
    }
}
