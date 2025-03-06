<?php

namespace App\Http\Requests\User\Product;

use Illuminate\Foundation\Http\FormRequest;

class UserProductStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {

        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:20',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.string' => 'Поле "Название" должно быть строкой.',
            'title.min' => 'Поле "Название" должно содержать не менее 3 символов.',

            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'description.string' => 'Поле "Описание" должно быть строкой.',
            'description.min' => 'Поле "Описание" должно содержать не менее 20 символов.',

            'price.required' => 'Поле "Цена" обязательно для заполнения.',
            'price.numeric' => 'Поле "Цена" должно быть числом.',
            'price.min' => 'Поле "Цена" должно быть не менее 1.',

            'category_id.required' => 'Поле "ID категории" обязательно для заполнения.',
            'category_id.integer' => 'Поле "ID категории" должно быть целым числом.',
            'category_id.exists' => 'Выбранная категория не существует.',
        ];
    }
}
