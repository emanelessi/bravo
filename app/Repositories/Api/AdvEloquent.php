<?php


namespace App\Repositories\Api;


use App\Models\Adv;

class AdvEloquent
{
    private $model;

    public function __construct(Adv $adv)
    {
        $this->model = $adv;
    }
}
