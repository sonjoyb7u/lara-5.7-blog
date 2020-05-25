<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
                'name' => 'string|min:3|max:40',
            ];

        } elseif ($this->method() === 'PATCH') {
            $rules = [
                'name' => 'string|min:3|max:40',
            ];

        } else {
            $rules = [
                'name' => 'required|string|min:3|max:40',
            ];

        }

        return $rules;

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tag Name is required',
            'name.string' => 'Tag Name must be Alpabatic Charecter\'s!',
            'name.min' => 'Tag Name must be minimum 3 charecter\'s!',
            'name.max' => 'Tag Name must be less than 40 charecter\'s!'
        ];
    }
}
