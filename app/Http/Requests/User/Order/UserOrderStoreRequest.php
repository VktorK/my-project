<?php

namespace App\Http\Requests\User\Order;

use Illuminate\Foundation\Http\FormRequest;

class UserOrderStoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'comment' => 'nullable|string',
            'total' => 'required|numeric'
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
            'user_id' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function messages(): array
    {
        return [
            'comment.required' => 'Поле "Комментарий" обязательно для заполнения.',
            'comment.string' => 'Поле "Комментарий" должно быть строкой.',

            'total.required' => 'Поле "Итоговая сумма" обязательно для заполнения.',
            'total.numeric' => 'Поле "Итоговая сумма" должно быть числом.',
        ];
    }
}
