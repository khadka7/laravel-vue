<?php

namespace App\Admin\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:120',
            'details'=>'required',
            'price'=>'required|max:120',
            "stock"=>"required",
            "discount"=>"required",
            "image"=>"image|mimes:jpeg,png,jpg,svg|max:2048",
        ];
    }
}
