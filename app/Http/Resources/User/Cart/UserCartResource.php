<?php

namespace App\Http\Resources\User\Cart;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_title' => $this->category->title,
            'qty' => $this->pivot->qty ?? 0,
            'total_sum' => $this->pivot->qty ? Product::totalSumProduct($this->pivot->qty,$this->price) : 0,
            'order_status' => is_null($this->pivot->order_id) ? 'на модерации' : Order::where('id',$this->pivot->order_id)->get('order_status')
        ];
    }
}
