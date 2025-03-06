<?php

namespace App\Services\User;



use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class CartService
{
    public static function index()
    {
        $user_id = auth()->id();

        return User::find($user_id)
            ->productsUserToCart()
            ->get();
    }


    public static function store(array $data, int $product_id): RedirectResponse
    {
        if ($data['existingProduct'] == 1) {
            auth()->user()->productsToCart()->updateExistingPivot($product_id, [
                'qty' => $data['qty'],
                'updated_at' => now()
            ]);
            return redirect()->back()->with('success', 'Количество обновлено');

        } else {
            auth()->user()->productsToCart()->attach($product_id, [
                'qty' => $data['qty'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return redirect()->back()->with('success', 'Товар добавлен в корзину!');
        }
    }


    public static function destroy($product_id): RedirectResponse
    {
        $user = auth()->user();
        $user->productsUserToCart()
            ->where('product_id', $product_id)
            ->delete();

        return redirect()->route('user.cart.index')->with('success', 'Товар удален из корзины');
    }

}
