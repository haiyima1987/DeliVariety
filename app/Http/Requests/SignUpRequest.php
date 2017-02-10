<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'username' => 'required|unique:users|min:6|',
            'password' => 'required|min:8|',
            'password_confirmation' => 'required|min:8|same:password',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users|email',
            'address' => 'required'
        ];
    }
}
