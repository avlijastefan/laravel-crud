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
                    'published'=> 'required|min:5|max:50|numeric|unique:books,published|bail',
                    'price' => 'required|min:5|max:10|numeric|unique:books,price|bail'
                ];
            break;

            case 'PUT':
                return [
                    'name' => 'required|min:5|max:50|alphanum_spaces|unique:books,name,'  . $this->id . ',id|bail',
                    'published'=> 'required|min:5|max:50|numeric|unique:books,published,|bail',
                    'price' => 'required|min:5|max:10|numeric|unique:books,price|bail'
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
            'name.bail' => 'Name is not required.',
            'published.required' => 'Published is required.',
            'published.min' => 'Published must be 5 characters.',
            'published.max' => 'Published can have a maximum of 50 characters.',
            'published.numeric' => 'Published must keep only numbers',
            'published.unique' => 'Published must not exist within the given database table.',
            'published.bail' =>'Published is not required.',
            'price.required' => 'Price is required.',
            'price.min' => 'Price must be 5 characters.',
            'price.max' => 'Price can have a maximum of 10 characters.',
            'price.numeric' => 'Price must keep only numbers',
            'price.unique' =>'Price must not exist within the given database table.',
            'price.bail' =>'Price is not required.'
        ];
    }
}
