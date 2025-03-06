<?php

namespace App\Services\User;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public static function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Order::all();
    }

    public static function store(array $data)
    {
        try {
            Db::beginTransaction();
            $order = Order::create($data);
            User::find(auth()->id())
                ->productsToCart()
                ->updateExistingPivot(auth()->user()
                    ->productsToCart->pluck('id'), [
                    'order_id' => $order->id
                ]);
            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
        }
        return $order;
    }

    public static function update(Order $order, array $data): ?Order
    {
        $order->update($data);
        return $order->fresh();
    }

    public static function destroy(Order $order): ?bool
    {
        $order->products()->detach();
        return $order->delete();
    }

}
