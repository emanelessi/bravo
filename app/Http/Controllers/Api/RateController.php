<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RateRequest;
use App\Repositories\Api\RateEloquent;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function __construct(RateEloquent $rateEloquent)
    {
        $this->rate = $rateEloquent;
    }
    public function rate(RateRequest $request){

        return $this->rate->rate($request->all());
    }
}
