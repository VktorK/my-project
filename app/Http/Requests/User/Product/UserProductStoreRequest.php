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
    public function rules()
    {

        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:20',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }
}
