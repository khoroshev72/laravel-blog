<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'integer|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png'
        ];
    }

    public function  messages()
    {
        return [
            'category_id.integer' => 'Выберите корректную категрию',
            'category_id.exists' => 'Выберите корректную категрию',
        ];
    }
}
