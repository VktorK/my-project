<?php

namespace App\Http\Resources\User\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class UserOrderStoreResource extends JsonResource
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
           'order_status' => $this->order_status ?? 'новый',
           'comment' => $this->comment,
           'total' => $this->total,
            'fio' => $this->user->fullname
        ];
    }
}
