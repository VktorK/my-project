<?php

namespace App\Http\Requests\User\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'nullable|string',
            'email'=> 'required|string|unique:users,email,' . auth()->id(),
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.string' => 'Поле name должно быть типа "строка"',
            'email.email' => 'Поле email должно быть типа "email"',
            'email.required' => 'Поле email обязательно к заполению',
        ];
    }
}
