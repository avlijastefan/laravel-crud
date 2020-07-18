<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|max:255|unique:users|bail',
            'password' => 'required|min:8|password|confirmed|alpha_num|bail'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be formatted as an e-mail address',
            'email.max' => 'Email can have a maximum of 255 characters',
            'email.unique' => 'Email must not exist within the given database table.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be 8 characters.',
            'password.password' => 'Password must match the authenticated user password.',
            'password.confirmed' => 'Password must have a matching field of confirmation',
            'password.alpha_num' => 'Password must be entirely alpha-numeric characters'
        ];

    }
}
