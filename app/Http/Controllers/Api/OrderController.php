<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\OrderEloquent;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(OrderEloquent $orderEloquent)
    {
        $this->order = $orderEloquent;
    }
}
