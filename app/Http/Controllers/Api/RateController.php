<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\RateEloquent;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function __construct(RateEloquent $rateEloquent)
    {
        $this->rate = $rateEloquent;
    }
}
