<?php

namespace App\Http\Requests\User\Order;

use Illuminate\Foundation\Http\FormRequest;

class UserOrderStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'comment' => 'required|string'
        ];
    }
}
