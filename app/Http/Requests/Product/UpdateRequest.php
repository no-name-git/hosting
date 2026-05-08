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
            'category_id' => 'required|exists:categories,id',

            // Картинки (массив файлов)
            'images' => 'nullable|array|min:1|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',

            // Варианты товара (массив)
            'variants' => 'required|array|min:1',
            'variants.*.sku' => 'required|string',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.old_price' => 'nullable|numeric|min:0',
            'variants.*.count' => 'required|integer|min:0',

            // Атрибуты для каждого варианта (размер, цвет и т.д.)
            'variants.*.attribute_values' => 'required|array|min:1',
            'variants.*.attribute_values.*' => 'exists:attribute_values,id',
        ];
    }

    public function messages()
    {
        return [
            // ----- Основной товар -----
            'title.required' => 'Название товара обязательно для заполнения.',
            'title.string' => 'Название товара должно быть строкой.',
            'title.max' => 'Название товара не может превышать 255 символов.',
            'title.unique' => 'Товар с таким названием уже существует.',

            'description.required' => 'Описание товара обязательно для заполнения.',
            'description.string' => 'Описание товара должно быть строкой.',

            'category_id.required' => 'Необходимо выбрать категорию товара.',
            'category_id.exists' => 'Выбранная категория не существует.',

            // ----- Картинки -----
            'images.required' => 'Необходимо загрузить хотя бы одно изображение.',
            'images.array' => 'Формат данных изображений некорректен.',
            'images.min' => 'Необходимо загрузить хотя бы одно изображение.',
            'images.max' => 'Максимальное количество изображений — 10.',

            'images.*.image' => 'Каждый загружаемый файл должен быть изображением.',
            'images.*.mimes' => 'Допустимые форматы изображений: JPEG, PNG, JPG, GIF, WEBP.',
            'images.*.max' => 'Размер каждого изображения не должен превышать 5 МБ.',

            // ----- Варианты товара (общие) -----
            'variants.required' => 'Необходимо добавить хотя бы один вариант товара.',
            'variants.array' => 'Формат данных вариантов некорректен.',
            'variants.min' => 'Необходимо добавить хотя бы один вариант товара.',

            // ----- SKU -----
            'variants.*.sku.required' => 'Артикул (SKU) обязателен для каждого варианта.',
            'variants.*.sku.string' => 'Артикул (SKU) должен быть строкой.',
            'variants.*.sku.unique' => 'Артикул (SKU) «:input» уже используется другим товаром.',

            // ----- Цена -----
            'variants.*.price.required' => 'Цена обязательна для каждого варианта.',
            'variants.*.price.numeric' => 'Цена должна быть числом.',
            'variants.*.price.min' => 'Цена не может быть отрицательной.',

            // ----- Старая цена -----
            'variants.*.old_price.numeric' => 'Старая цена должна быть числом.',
            'variants.*.old_price.min' => 'Старая цена не может быть отрицательной.',

            // ----- Количество -----
            'variants.*.count.required' => 'Количество товара обязательно для каждого варианта.',
            'variants.*.count.integer' => 'Количество товара должно быть целым числом.',
            'variants.*.count.min' => 'Количество товара не может быть отрицательным.',

            // ----- Атрибуты вариантов -----
            'variants.*.attribute_values.required' => 'Необходимо указать характеристики для каждого варианта (например, цвет, размер).',
            'variants.*.attribute_values.array' => 'Формат характеристик некорректен.',
            'variants.*.attribute_values.min' => 'Для каждого варианта нужно указать хотя бы одну характеристику.',
            'variants.*.attribute_values.*.exists' => 'Выбранная характеристика не существует в системе.',
        ];
    }
}
