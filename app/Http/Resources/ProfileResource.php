<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        `phone`, `password`,  `phone_verified_at`, `is_verify`, `forget_code`, `is_active`, `photo`
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'hire_date' => $this->hire_date,
            'salary' => $this->salary,
            'photo' => $this->photo,
            'department' => new departmentResource($this->department),
            'type'=>$this->type,
            'manager' => new profileResource($this->manager),
        ];
    }
}
