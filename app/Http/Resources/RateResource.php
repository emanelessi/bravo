<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        id`, `rate`, `product_id`, `user_id`
        return[
            'id'=>$this->id,
            'rate'=>$this->rate,
            'product'=>new ProductResource($this->product),
            'user'=>new UserResource($this->user),
        ];
    }
}
