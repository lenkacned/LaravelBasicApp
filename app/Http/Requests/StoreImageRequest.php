<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    //Determine if the user is authorized to make this request.
    public function authorize(): bool
    {
        return true;
    }
    
    //Get the validation rules that apply to the request.
    public function rules(): array
    {
        return [
            'title' => 'required',
            'slug' => 'required|unique:images,slug',
            'image' => 'required|image'
        ];
    }
}
