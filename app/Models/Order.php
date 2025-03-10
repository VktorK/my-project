<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = 'orders';

    const ORDER_SUCCSESS = 'исполнен';


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_user','order_id','product_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
