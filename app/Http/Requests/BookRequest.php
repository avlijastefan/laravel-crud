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
                    'name' => 'required|min:5|max:50|alpha|unique:books,name|bail',
                    'published'=> 'required|min:5|max:50|unique:books,published|bail',
                    'price' => 'required|min:5|max:10|unique:books,price|bail'
                ];
            break;

            case 'PUT':
                return [
                    'name' => 'required|min:5|max:50|alpha|unique:books,name,'  . $this->id . ',id|bail',
                    'published'=> 'required|min:5|max:50|unique:books,published,|bail',
                    'price' => 'required|min:5|max:10|unique:books,price|bail'
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
            'name.alpha' => 'Name must be entirely alphabetic characters.',
            'name.unique' => 'Name must not exist within the given database table.',
            'name.bail' => 'Name is not required.',
            'published.required' => '',
            'published.min' => '',
            'published.max' => '',
            'published.unique' => '',
            'published.bail' =>'',
            'price.required' => '',
            'price.min' => '',
            'price.max' => '',
            'price.unique' =>'',
            'price.bail' =>''
        ];
    }
}
