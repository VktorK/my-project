<?php

namespace App\Http\Resources\User\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderStatusResource extends JsonResource
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
            'id' => $this->id,
            'total' => $this->total,
            'comment' => $this->comment,
            'order_status' => $this->order_status,
            'user_id' => $this->user_id
        ];
    }
}
