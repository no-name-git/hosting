<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                Rule::unique('categories', 'title')
            ],
            'slug' => [
                'required',
                'string',
                Rule::unique('categories', 'slug')
            ],
        ];
    }
    public function messages()
    {
        return [
            'title' => [
                'required' => 'Поле "Название" обязательно для заполнения.',
                'string' => 'Поле "Название" должно быть строкой.',
                'unique' => 'Категория с таким названием уже существует.'
            ],
            'slug' => [
                'required' => 'Поле "Slug" обязательно для заполнения.',
                'string' => 'Поле "Slug" должно быть строкой.',
                'unique' => 'Категория с таким URL-именем (slug) уже существует.'
            ],
        ];
    }
}
