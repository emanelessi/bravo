<?php


namespace App\Repositories\Api;


use App\Models\Address;

class AddressEloquent
{
    private $model;

    public function __construct(Address $address)
    {
        $this->model = $address;
    }

}
