<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Order\Cart\StoreCartRequest;
use App\Http\Resources\User\Cart\UserCartResource;
use App\Models\Product;
use App\Services\User\CartService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products = CartService::index();
        $total_sum_products = Product::calculateTotalCost($products);
        $userCartResource = UserCartResource::collection($products)->resolve();

        return view('user/cart/index',compact('userCartResource','total_sum_products'));
    }

    public function storeToCart(StoreCartRequest $request,$product_id): RedirectResponse
    {
        $data = $request->validationData();
        return CartService::store($data,$product_id);

    }

    public function removeFromCart($product_id): RedirectResponse
    {
        return CartService::destroy($product_id);
    }


}
