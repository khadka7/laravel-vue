<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255|unique:products',
            'details'=>'required',
            'price'=>'required|max:10',
            'stock'=>'required|max:5',
            'discount'=>'max:2',
        ];
    }
}
