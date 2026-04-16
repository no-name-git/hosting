<?php

namespace App\Http\Requests\Product;

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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'structure' => 'nullable|string',
            'cooking_method' => 'nullable|string',
            'price' => 'required|integer|min:1',
            'is_published' => 'required|boolean',
            'calories' => 'nullable|integer|min:1',
            'hit_sale' => 'required|boolean',
            'images' => 'nullable|file|mimes:jpeg,png,gif,webp|max:5120',

            'category_id' => ['required', Rule::exists('categories', 'id')],
//            'delete_images' => 'nullable|array', // Для удаления существующих изображений
//            'delete_images.*' => 'numeric|exists:product_images,id',
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

            // Поле structure
            'structure.string' => 'Состав должен быть текстом',

            // Поле cooking_method
            'cooking_method.string' => 'Способ приготовления должен быть текстом',

            // Поле price
            'price.required' => 'Пожалуйста, укажите цену товара',
            'price.integer' => 'Цена должна быть целым числом',
            'price.min' => 'Цена должна быть положительной',


            // Поле calories
            'calories.integer' => 'Калории должны быть целым числом',
            'calories.min' => 'Калории должны быть положительным числом',



            // Поле images
//            'images.required' => 'Пожалуйста, загрузите хотя бы одно изображение',
            'images.array' => 'Изображения должны быть переданы в виде массива',
            'images.min' => 'Загрузите хотя бы одно изображение',
            'images.max' => 'Максимальное количество изображений: 10',
            'images.*.image' => 'Файл должен быть изображением',
            'images.*.mimes' => 'Допустимые форматы: jpeg, png, jpg, gif, webp',
            'images.*.max' => 'Максимальный размер изображения: 5MB',

            // Поле category_id
            'category_id.required' => 'Пожалуйста, выберите категорию',
            'category_id.exists' => 'Выбранная категория не существует или неактивна',


        ];
    }
}
