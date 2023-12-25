<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Intervention\Image\Gd\Driver;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Models\Image;
use App\Http\Requests\StoreImageRequest;

class AdminImageController extends Controller
{
    public function index()
    {
        return view('admin.images.index');
    }

    public function create()
    {
        return view('admin.images.create');
    }

    //store an Image file
    public function store(StoreImageRequest  $request): RedirectResponse
    {
        // The incoming request is valid

        // Retrieve the validated input data
        $attributes = $request->validated();


        //store image and optimize it
            try{            
               $attributes['image'] = Storage::disk('public')->putFile('images', $attributes['image']);

                //Optimize the image
                $this->optimize($attributes['image']);

            } catch (Exception $e){
                throw ValidationException::withMessages([
                    'email' => 'Your image could not be uploaded.']);
            }
            
        //create image
        Image::create($attributes);
        return redirect('/')
                ->with('success', 'Your image has been saved!');
    }

    //Delete an image
    public function destroy(Image $image)
    {
        $image->delete();
        if(Storage::disk('public')->exists($image->image)){
            Storage::disk('public')->delete($image->image);
        }
        return back()->with('success', 'Your image has been deleted!');
    }
    public function optimize(string $img_path){

        //create full image path to storage image directory
        $full_img_path = Storage::disk('public')->path($img_path);

        // create image manager with desired driver
        $manager = new ImageManager(['driver' => 'gd']);

        // read image from file system & save modified image in new format 
        $image = $manager->make($full_img_path)->resize(300,300)->save($full_img_path, 10);
        
    }
}
