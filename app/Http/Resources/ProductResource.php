<?php

namespace App\Http\Resources;

use App\Models\Rate;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        `img`, `name`, `main_price`, `current_price`, `description`, `category_id
        return [
            'id'=>$this->id,
            'name'=>$this->translation()->name,
            'img'=>$this->img,
            'main_price'=>$this->main_price,
            'current_price'=>$this->current_price,
            'description'=>$this->translation()->description,
            'category'=>new CategoryResource($this->category),
        'rate'=> Rate::where('product_id', $this->product_id)->AVG('rate'),
//            'rate' => $this->rate,
        ];
    }
}
