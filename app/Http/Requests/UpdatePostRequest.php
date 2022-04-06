<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'preamble' => 'string|nullable',
            'category_id' => 'required|numeric',
            'photo' => 'sometimes|image|mimes:jpg,png|max:10240|nullable'
        ];
    }
}
