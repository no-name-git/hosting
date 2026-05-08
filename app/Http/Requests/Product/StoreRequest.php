<?php

namespace App\Http\Requests\Product;

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
            'title' => 'required|string|max:255|unique:products,title',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',



            // Варианты товара (массив)
            'variants' => 'required|array|min:1',
            'variants.*.sku' => 'required|string|unique:product_variants,sku',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.old_price' => 'nullable|numeric|min:0',
            'variants.*.count' => 'required|integer|min:0',

            // Изображения для КАЖДОГО варианта
            'variants.*.images' => 'required|array|min:1|max:10',
            'variants.*.images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',

            // Атрибуты для каждого варианта (размер, цвет и т.д.)
            'variants.*.attribute_values' => 'required|array|min:1',
            'variants.*.attribute_values.*' => 'exists:attribute_values,id',
        ];
    }

    public function messages()
    {
        return [
            // ----- Основной товар -----
            'title.required' => 'Название товара обязательно.',
            'title.string' => 'Название должно быть строкой.',
            'title.max' => 'Название не может превышать 255 символов.',
            'title.unique' => 'Товар с таким названием уже существует.',

            'description.required' => 'Описание товара обязательно.',
            'description.string' => 'Описание должно быть строкой.',

            'category_id.required' => 'Выберите категорию.',
            'category_id.exists' => 'Категория не существует.',

            // ----- Варианты -----
            'variants.required' => 'Добавьте хотя бы один вариант товара.',
            'variants.array' => 'Неверный формат вариантов.',
            'variants.min' => 'Добавьте хотя бы один вариант.',

            // ----- SKU -----
            'variants.*.sku.required' => 'Артикул (SKU) обязателен.',
            'variants.*.sku.string' => 'Артикул должен быть строкой.',

            // ----- Цены -----
            'variants.*.price.required' => 'Цена обязательна.',
            'variants.*.price.numeric' => 'Цена должна быть числом.',
            'variants.*.price.min' => 'Цена не может быть отрицательной.',

            'variants.*.old_price.numeric' => 'Старая цена должна быть числом.',
            'variants.*.old_price.min' => 'Старая цена не может быть отрицательной.',

            // ----- Количество -----
            'variants.*.count.required' => 'Укажите количество товара.',
            'variants.*.count.integer' => 'Количество должно быть целым числом.',
            'variants.*.count.min' => 'Количество не может быть отрицательным.',

            // ----- Изображения -----
            'variants.*.images.required' => 'Добавьте хотя бы одно изображение для варианта.',
            'variants.*.images.array' => 'Неверный формат изображений.',
            'variants.*.images.min' => 'Загрузите хотя бы одно изображение.',
            'variants.*.images.max' => 'Максимум 10 изображений на вариант.',
            'variants.*.images.*.image' => 'Файл должен быть изображением.',
            'variants.*.images.*.mimes' => 'Допустимые форматы: jpeg, png, jpg, gif, webp.',
            'variants.*.images.*.max' => 'Размер изображения не должен превышать 5 МБ.',

            // ----- Атрибуты -----
            'variants.*.attribute_values.required' => 'Укажите характеристики варианта (цвет, размер и т.д.).',
            'variants.*.attribute_values.array' => 'Неверный формат характеристик.',
            'variants.*.attribute_values.min' => 'Укажите хотя бы одну характеристику.',
            'variants.*.attribute_values.*.exists' => 'Характеристика не найдена в системе.',
        ];
    }
}
