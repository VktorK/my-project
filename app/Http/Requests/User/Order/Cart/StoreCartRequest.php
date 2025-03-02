<?php

namespace App\Http\Requests\User\Order\Cart;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'qty' => 'required|integer|min:1'
        ];
    }
}
