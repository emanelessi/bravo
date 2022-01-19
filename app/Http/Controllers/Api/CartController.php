<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\CartEloquent;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CartEloquent $cartEloquent)
    {
        $this->cart = $cartEloquent;
    }
}
