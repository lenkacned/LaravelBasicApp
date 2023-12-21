<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;

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

        //store image
            try{            
                $attributes['image'] = $attributes['image']->store('images','public');
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
        // ddd($image->image);
        $image->delete();
        if(is_file($image->image)){
            Storage::delete($image->image);
        }
        return back()->with('success', 'Your image has been deleted!');
    }
    public function optimize(string $path){
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // to finally create image instances
        $image = $manager->make($path)->resize(200, 200);

        $image->toPng()->save('images/foo.png');
    }
}
