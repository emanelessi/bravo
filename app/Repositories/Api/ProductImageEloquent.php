<?php


namespace App\Repositories\Api;


use App\Models\ProductImage;

class ProductImageEloquent
{
    private $model;

    public function __construct(ProductImage $productImage)
    {
        $this->model = $productImage;
    }
}
