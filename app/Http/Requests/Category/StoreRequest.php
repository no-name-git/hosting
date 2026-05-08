<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'attributes' => 'required|array|min:1',
            'attributes.name' => 'required|string',
            'attributes.slug' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.string' => 'Поле "Название" должно быть строкой.',
            'title.unique' => 'Категория с таким названием уже существует.',

            'slug.required' => 'Поле "Slug" обязательно для заполнения.',
            'slug.string' => 'Поле "Slug" должно быть строкой.',
            'slug.unique' => 'Категория с таким URL-именем (slug) уже существует.',

            'attributes.required' => 'Добавьте хотя бы один вариант товара.',
            'attributes.array' => 'Неверный формат вариантов.',
            'attributes.min' => 'Добавьте хотя бы один вариант.',

            'attributes.name.required' => 'Название атрибута обязательно.',
            'attributes.name.string' => 'Название атрибута должно быть строкой.',

            'attributes.slug.required' => 'Slug атрибута обязателен.',
            'attributes.slug.string' => 'Slug атрибута должен быть строкой.',
        ];
    }
}
