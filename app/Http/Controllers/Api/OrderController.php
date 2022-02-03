<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckOutRequest;
use App\Http\Requests\OrderRequest;
use App\Repositories\Api\OrderEloquent;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(OrderEloquent $orderEloquent)
    {
        $this->order = $orderEloquent;
    }
    public function show()
    {
        return $this->order->show();
    }
//    public function store(OrderRequest $request)
//    {
//        return $this->order->store($request->all());
//    }
    public function store($id)
    {
        return $this->order->store($id);
    }
    public function CheckOut(CheckOutRequest $request)
    {
        return $this->order->CheckOut($request->all());
    }

}
