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
                    'price' => 'required|min:5|max:10|digits_between:min,max|numeric|bail'
                ];
            break;

            case 'PUT':
                return [
                    'name' => 'required|min:5|max:50|alphanum_spaces|unique:books,name,'  . $this->id . ',id|bail',
                    'published'=> 'required|max:9999|numeric|bail',
                    'price' => 'required|min:5|max:10|digits_between:min,max|numeric|bail'
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
            'published.max' => 'Published can have a maximum of 9999 numbers.',
            'published.numeric' => 'Published must keep only numbers',
            'published.bail' =>'Published is not required.',
            'price.required' => 'Price is required.',
            'price.min' => 'Price must be 5 characters.',
            'price.max' => 'Price can have a maximum of 10 characters.',
            'price.digits_between' => 'Price must have a length between the given min and max.',
            'price.numeric' => 'Price must keep only numbers',
            'price.bail' =>'Price is not required.'
        ];
    }
}
