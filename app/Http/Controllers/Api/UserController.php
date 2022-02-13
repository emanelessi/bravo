<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordCodeRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ProfileRequest;
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
    public function forgotPasswordCode(ForgotPasswordCodeRequest $request)
    {
        return $this->user->forgotPasswordCode($request->all());
    }
    public function editProfile(ProfileRequest $request)
    {
        return $this->user->editProfile($request->all());
    }
    public function logout()
    {
        return $this->user->logout();
//        $request->user()->token()->revoke();
////        $item=[
////            'status' => true,
////            'statusCode' => 200,
////            'message' => 'Successfully logged out',
////            'data' => []
////        ];
////        return response()->json($item);
//
//        return response_api(true, 200, 'Successfully logged out', '');
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
