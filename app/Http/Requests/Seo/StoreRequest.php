<?php

namespace App\Http\Requests\Seo;

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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'product_id' => [
                'required',
                Rule::exists('products', 'id'),
                Rule::unique('tags', 'product_id'),
            ],
        ];
    }
    public function messages()
    {
        return [
            // Поле title
            'title.required' => 'Пожалуйста, введите название товара',
            'title.string' => 'Название должно быть текстом',
            'title.max' => 'Название не должно превышать 255 символов',

            // Поле description
            'description.required' => 'Пожалуйста, введите описание товара',
            'description.string' => 'Описание должно быть текстом',
            'description.max' => 'Описание не должно превышать 255 символов',

            // Поле description
            'keywords.required' => 'Пожалуйста, введите keywords товара',
            'keywords.string' => 'keywords должно быть текстом',
            'keywords.max' => 'keywords не должно превышать 255 символов',

            // Поле product_id
            'product_id.required' => 'Пожалуйста, выберите товар',
            'product_id.exists' => 'Выбранный товар не существует или неактивен',
            'product_id.unique' => 'SEO с такими параметрами уже существует',
        ];
    }
}
