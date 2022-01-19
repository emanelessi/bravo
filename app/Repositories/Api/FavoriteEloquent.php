<?php


namespace App\Repositories\Api;


use App\Models\Favorite;

class FavoriteEloquent
{
    private $model;

    public function __construct(Favorite $favorite)
    {
        $this->model = $favorite;
    }
}
