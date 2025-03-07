<?php

namespace App\Http\Requests\User\Order\Cart;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'qty' => 'required|integer|min:1',
            'product_id' => 'required|integer|exists:products,id'
        ];
    }

    protected function prepareForValidation()
    {
        $product_id = $this->input('product_id');
        $existingProduct = auth()->user()->productsToCart()->where('product_id', $product_id)->exists() ? 1 : 0;
        return $this->merge([
            'existingProduct' => $existingProduct
        ]);
    }

    public function messages(): array
    {
        return [
            'qty.required' => 'Поле "Количество" обязательно для заполнения.',
            'qty.integer' => 'Поле "Количество" должно быть целым числом.',
            'qty.min' => 'Поле "Количество" должно быть не меньше 1.',

            'product_id.required' => 'Поле "ID продукта" обязательно для заполнения.',
            'product_id.integer' => 'Поле "ID продукта" должно быть целым числом.',
            'product_id.exists' => 'Выбранный продукт не существует в нашей базе данных.',
        ];
    }
}
