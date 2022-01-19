<?php


namespace App\Repositories\Api;


use App\Models\User;

class UserEloquent
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
