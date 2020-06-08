<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if($this->method() === 'PUT') {
            $rules = [
                'name' => 'required|string|min:3|max:60',
                'image' => 'mimes:jpeg,png,jpg',
            ];
        } elseif ($this->method() === "PATCH") {
            $rules = [
                'name' => 'required|string|min:3|max:60',
                'image' => 'mimes:jpeg,png,jpg',
            ];
        } else {
            $rules = [
                'name' => 'required|unique:categories|string|min:3|max:60',
                'image' => 'required|mimes:jpeg,png,jpg',
            ];

        }
        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Category Name field must be filled out!',
            'name.unique:categories' => 'Category Name has already be taken!',
            'name.string' => 'Category name must be Small or Capital Alphabetic letter!',
            'name.min:5' => 'Category name at-least 3 Character\'s!',
            'name.max:60' => 'Category name must be less than 60 Character\'s',
            'image.required' => 'Category Image field must be filled out!',
            'image.image' => 'Please upload an image',
            'image.mimes' => 'Only jpeg, jpg, png images are allowed',
        ];
    }
}
