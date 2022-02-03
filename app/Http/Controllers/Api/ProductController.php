<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Api\ProductEloquent;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductEloquent $productEloquent)
    {
        $this->product = $productEloquent;
    }


//    public function get($id)
//    {
//        return $this->product->get($id);
//    }

    public function show()
    {
        return $this->product->show();
    }
    public function store($id)
    {
        return $this->product->store($id);
    }
}
