<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Repositories\Api\UserEloquent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserEloquent $userEloquent)
    {
        $this->user = $userEloquent;
    }
    public function register(SignupRequest $request)
    {
        return $this->user->register($request->all());
    }
    public function login()
    {
        return $this->user->login();
    }
    public function home($id = null)
    {
        return $this->user->home($id);

    }
}
