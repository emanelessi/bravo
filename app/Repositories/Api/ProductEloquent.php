<?php


namespace App\Repositories\Api;


use App\Models\Product;

class ProductEloquent
{
    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }
}
