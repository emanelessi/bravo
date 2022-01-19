<?php


namespace App\Repositories\Api;


use App\Models\Order;

class OrderEloquent
{
    private $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }
}
