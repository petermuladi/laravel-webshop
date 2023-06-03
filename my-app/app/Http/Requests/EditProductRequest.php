<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
            'name'=>'required|max:255',
            'description'=>'max:255',
            'price'=>'numeric|min:1',
            'threepiecesprice'=>'numeric|min:1',
            'fivepiecesprice'=>'numeric|min:1',
        ];
    }
}
