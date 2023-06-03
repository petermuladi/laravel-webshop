<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|unique:products|max:255',
            'description'=>'max:255',
            'price'=>'required|numeric|min:1',
            'threepiecesprice'=>'numeric|min:1',
            'fivepiecesprice'=>'numeric|min:1',
        ];
    }
}
