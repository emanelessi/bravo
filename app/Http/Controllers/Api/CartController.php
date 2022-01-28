<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Repositories\Api\CartEloquent;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CartEloquent $cartEloquent)
    {
        $this->cart = $cartEloquent;
    }
    public function show()
    {
        return $this->cart->show();
    }
    public function addToCart(CartRequest $request)
    {
        return $this->cart->addToCart($request->all());
    }


}
