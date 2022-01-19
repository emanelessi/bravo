<?php


namespace App\Repositories\Api;


use App\Models\Rate;

class RateEloquent
{
    private $model;

    public function __construct(Rate $rate)
    {
        $this->model = $rate;
    }
}
