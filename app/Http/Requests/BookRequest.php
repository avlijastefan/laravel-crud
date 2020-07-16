<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
                    'name' => 'required|min:5|max:50|alphanum_spaces|unique:books,name|bail',
                    'published'=> 'required|max:9999|numeric|bail',
                    'price' => 'required|digits_between:0,10|numeric|bail'
                ];
            break;

            case 'PUT':
                return [
                    'name' => 'required|min:5|max:50|alphanum_spaces|unique:books,name,'  . $this->id . ',id|bail',
                    'published'=> 'required|max:9999|numeric|bail',
                    'price' => 'required|digits_between:0,10|numeric|bail'
                ];
            break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be 5 characters.',
            'name.max' => 'Name can have a maximum of 50 characters.',
            'name.alphanum_spaces' => 'Name must be entirely alphabetic characters.',
            'name.unique' => 'Name must not exist within the given database table.',
            'published.required' => 'Published is required.',
            'published.max' => 'Published can have a maximum of 9999 numbers.',
            'published.numeric' => 'Published must keep only numbers',
            'price.required' => 'Price is required.',
            'price.digits_between' => 'Price must have a length between the given min 0 and max 10.',
            'price.numeric' => 'Price must keep only numbers'
         ];
    }
}
