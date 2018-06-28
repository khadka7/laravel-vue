<?php

namespace App\Api\User\Requests;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username'=>'required|min:6|max:15',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=> 'required|min:6'
        ];
    }


}
