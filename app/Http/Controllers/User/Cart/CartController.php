<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Order\Cart\StoreCartRequest;
use App\Http\Resources\User\Cart\UserCartResource;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $products = User::find($userId)
            ->productsUserToCart()
            ->get();

        $userCartResource = UserCartResource::collection($products)->resolve();
//        dd($userCartResource);
        return view('user/cart/index',compact('userCartResource'));
    }

    public function storeToCart(StoreCartRequest $request,Product $product)
    {
        $data = $request->validated();
        $existingRecord = auth()->user()->productsToCart()->where('product_id', $product->id)->first();
        if ($existingRecord) {
            auth()->user()->productsToCart()->updateExistingPivot($product->id, [
                'qty' => $data['qty'],
            ]);
        } else {
            auth()->user()->productsToCart()->attach($product->id, ['qty' => $data['qty']]);
        }

        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }
}
