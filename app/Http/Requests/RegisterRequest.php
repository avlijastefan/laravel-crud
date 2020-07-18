<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|alphanum_spaces|bail',
            'email' => 'required|email|max:255|unique:users|bail',
            'password' => 'required|min:8|confirmed|alpha_num|bail'
                    
        ];
            
     }
    
     public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be 3 characters.',
            'name.max' => 'Name can have a maximum of 255 characters.',
            'name.alphanum_spaces' => 'Name must be entirely alphabetic characters.',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be formatted as an e-mail address',
            'email.max' => 'Email can have a maximum of 255 characters',
            'email.unique' => 'Email must not exist within the given database table.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be 8 characters.',
            'password.confirmed' => 'Password must have a matching field of confirmation',
            'password.alpha_num' => 'Password must be entirely alpha-numeric characters'
        ];
    }
}
