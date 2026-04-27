<?php

namespace App\Http\Requests\Color;

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
            'code' => [
                'required',
                'string',
                Rule::unique('colors', 'code'),
            ],
            'code' => 'min:3|max:6',
            'title' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'это обязательное поле',
            'code.string' => 'это поле должно быть строкой',
            'code.required' => 'это обязательное поле',
            'code.string' => 'это поле должно быть строкой',
            'code.unique' => 'Тег с таким названием уже существует',
            'code.min' => 'Минимальная длина кода 3 символа',
            'code.max' => 'Максимальная длина кода 6 символов',
        ];
    }
}
