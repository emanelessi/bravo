<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        `id`, `quantity`, `product_id`, `user_id`, `cost`, `states`, `address`, `latitude`, `longitude`,
        return [
            'id'=>$this->id,
            'quantity'=>$this->quantity,
            'user'=>new userResource($this->user),
            'product'=>new ProductResource($this->product),
            'cost'=>$this->cost,
            'states'=>$this->states,
            'address'=>$this->address,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
        ];
    }
}
