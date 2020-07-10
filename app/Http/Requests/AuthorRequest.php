<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
        switch($this->method())
        {           
            case 'POST':
                return [
                    'first_name' => 'required|min:5|max:20|uniqueFirstAndLastName:{$request->last_name}|bail',
                    'last_name' => 'required|min:5|max:20|alpha|bail'
                    
                ];
            break;

            case 'PUT':
                return [
                    'first_name' => 'required|min:5|max:20|uniqueFirstAndLastName:{$request->last_name},'  . $this->id . ',id|bail',
                    'last_name' => 'required|min:5|max:20|alpha|bail'
                ];
            break;
        }
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.min' => 'First name must be 5 characters.',
            'first_name.max' => 'First name can have a maximum of 20 characters.',
            'first_name.uniqueFirstAndLastName' => 'Author name not unique.',
            'last_name.required' => 'Last name is required.',
            'last_name.min' => 'Last name must be 5 characters.',
            'last_name.max' => 'Last name can have a maximum of 20 characters.',
            'last_name.alpha' => 'Last name must be entirely alphabetic characters.'
         ];
    }
}
