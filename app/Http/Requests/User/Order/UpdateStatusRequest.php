<?php

namespace App\Http\Requests\User\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'order_status' => 'required|string|in:' . Order::ORDER_SUCCSESS,
        ];
    }
}
