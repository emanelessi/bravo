<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\UserEloquent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserEloquent $userEloquent)
    {
        $this->user = $userEloquent;
    }
}
