<?php

namespace App\Http\Requests\User\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "имя пользователя" обязательно к заполнению',
            'email.required' => 'Поле "email" обязательно к заполнению',
            'password.required' => 'Поле "password" обязательно к заполнению',
            'confirm_password.required' => 'Поле "confirm password" обязательно к заполнению',
            'name.string' => 'Поле "имя пользователя" должно быть строкой',
            'email.email' => 'Поле "email" должно быть строкой',
            'password.string' => 'Поле "password" должно быть строкой',
            'confirm_password.string' => 'Поле "confirm password" должно быть строкой',
            'confirm_password.same' => 'Поле "confirm password" должно совпадать с полем "password',
        ];
    }

    protected function passedValidation()
    {
        return $this-> merge([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }
}
