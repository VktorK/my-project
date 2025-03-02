<?php

namespace App\Services\User;

use App\Http\Resources\User\Product\UserProductStoreResource;
use App\Models\Product;

class ProductService
{
    public static function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    public static function store(array $data): Product
    {
        return Product::create($data);
    }

    public static function update(Product $product, array $data): ?Product
    {
        $product->update($data);
        return $product->fresh();
    }

    public static function destroy(Product $product): ?bool
    {
        return $product->delete();
    }

}
