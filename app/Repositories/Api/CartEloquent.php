<?php


namespace App\Repositories\Api;


use App\Models\Cart;

class CartEloquent
{
    private $model;

    public function __construct(Cart $cart)
    {
        $this->model = $cart;
    }
}
