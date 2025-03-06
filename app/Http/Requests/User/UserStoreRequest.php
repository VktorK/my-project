<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3|max:100',
            'last_name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|same:re_password',
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'password' => Hash::make($this->password),
        ]);

        $data = $this->except('re_password');

        $this->replace($data);
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле "Имя" обязательно для заполнения.',
            'first_name.string' => 'Поле "Имя" должно быть строкой.',
            'first_name.min' => 'Поле "Имя" должно содержать не менее 3 символов.',
            'first_name.max' => 'Поле "Имя" должно содержать не более 100 символов.',

            'last_name.required' => 'Поле "Фамилия" обязательно для заполнения.',
            'last_name.string' => 'Поле "Фамилия" должно быть строкой.',
            'last_name.min' => 'Поле "Фамилия" должно содержать не менее 3 символов.',
            'last_name.max' => 'Поле "Фамилия" должно содержать не более 100 символов.',

            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Поле "Email" должно содержать корректный адрес электронной почты.',
            'email.unique' => 'Этот адрес электронной почты уже зарегистрирован.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string' => 'Поле "Пароль" должно быть строкой.',
            'password.same' => 'Пароли не совпадают. Пожалуйста, повторите ввод.',
        ];
    }
}
