<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';


    protected $guarded = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'product_user','product_id','order_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('qty', 'order_id');
    }

    public static function totalSumProduct($qty,$price): float|int
    {
       return $qty * $price;
    }

    public static function calculateTotalCost($cartItems): float|int
    {
        $totalCost = 0;

        foreach ($cartItems as $item) {
            $totalCost += $item->pivot->qty * $item->price;
        }

        return $totalCost;
    }

    public static function getCartCount(): int
    {
        $userId = auth()->id();
        if ($userId === null) {
            return 0;
        }
        $user = User::with('productsCount')->find($userId);
        return $user->productsCount->sum(function($product) {
            return $product->pivot->qty;
        });


    }

}
