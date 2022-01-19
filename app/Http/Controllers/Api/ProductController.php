<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\ProductEloquent;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductEloquent $productEloquent)
    {
        $this->product = $productEloquent;
    }
}
