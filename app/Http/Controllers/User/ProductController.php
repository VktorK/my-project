<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Product\UserProductStoreRequest;
use App\Http\Requests\User\Product\UserProductUpdateRequest;
use App\Http\Resources\User\Product\ProductIndexResource;
use App\Http\Resources\User\Product\UserProductStoreResource;
use App\Http\Resources\User\Product\UserProductUpdateResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\User\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products = ProductService::index();
        $count = $this->getCartCount();
        $productResource = ProductIndexResource::collection($products)->resolve();

        view()->share('count', $count);

        return view('user/product/index', compact('productResource'));
    }

    public function show(Product $product): Factory|View|Application
    {
        $product = ProductIndexResource::make($product)->resolve();
        return view('user/product/show', compact('product'));
    }

    public function create(): Factory|View|Application
    {
        $categories = Category::all();
        return view('user/product/create',compact('categories'));
    }

    public function store(UserProductStoreRequest $request): Factory|View|Application
    {
        $data = $request->validated();
        $newProduct = ProductService::store($data);
        $product = UserProductStoreResource::make($newProduct)->resolve();
        return view('user/product/show', compact('product'));

    }

    public function edit($id): Factory|View|Application
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('user/product/edit', compact('product', 'categories'));

    }

    public function update(UserProductUpdateRequest $request,Product $product,): RedirectResponse
    {
        $data = $request->validated();
        $product = ProductService::update($product, $data);
        $resourceProduct = UserProductUpdateResource::make($product)->resolve();
        return redirect()->route('user.product.index',compact('resourceProduct'))->with('success', 'Продукт успешно обновлён');
    }

    public function destroy(Product $product): RedirectResponse
    {
            ProductService::destroy($product);
            return redirect()->route('user.product.index');
    }

    public function getCartCount(): int
    {
        $userId = auth()->id();
        $user = User::with('productsCount')->find($userId);
        $productsWithQuantity = $user->productsCount->map(function ($productsCount) {
            return [
                'qty' => $productsCount->pivot->qty
            ];
        });
        return  $productsWithQuantity->sum('qty');
    }

}
