<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\verifcationCodeRequest;
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
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        return $this->user->forgotPassword($request->all());
    }
    public function logout(Request $request)
    {

        return $this->user->logout($request->all());
    }
    public function profile()
    {
        return $this->user->profile();
    }

//    public function home()
//    {
//        return $this->user->home();
//    }
    public function verify(verifcationCodeRequest $request)
    {
        return $this->user->verify($request->all());
    }
}
