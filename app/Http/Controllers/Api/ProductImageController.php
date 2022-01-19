<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\ProductImageEloquent;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function __construct(ProductImageEloquent $productImageEloquent)
    {
        $this->productImage = $productImageEloquent;
    }
}
