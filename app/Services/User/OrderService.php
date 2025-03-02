<?php

namespace App\Services\User;

use App\Models\Order;

class OrderService
{
    public static function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Order::all();
    }

    public static function store(array $data): ?Order
    {
        return Order::create($data);
    }

    public static function update(Order $order, array $data): ?Order
    {
        $order->update($data);
        return $order->fresh();
    }

    public static function destroy(Order $order): ?bool
    {
        return $order->delete();
    }

}
