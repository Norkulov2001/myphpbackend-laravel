<?php

namespace App\Http\Requests\Phones;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'type' => 'required',
            'name' => 'required',
            'years' => 'required|numeric:max:6',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|file:size:5000'
        ];
    }
}
