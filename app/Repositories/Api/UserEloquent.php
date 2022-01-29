<?php


namespace App\Repositories\Api;

use App\Http\Resources\FavoriteResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;



class UserEloquent
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function register(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return response_api(true, 200, 'Successfully Register!', $user->fresh());

    }

    public function login()
    {
        $proxy = Request::create('oauth/token', 'POST');
        $response = Route::dispatch($proxy);
        $statusCode = $response->getStatusCode();
        $response = json_decode($response->getContent());
        if ($statusCode != 200)
            return response_api(false, $statusCode, $response['message'], $response);

        $response_token = $response;
        $token = $response->access_token;
        \request()->headers->set('Authorization', 'Bearer ' . $token);

        $proxy = Request::create('api/home', 'POST');

        $response = Route::dispatch($proxy);

        $statusCode = $response->getStatusCode();
        $data = json_decode($response->getContent());
        return response_api(true, $statusCode, 'Successfully Login', ['token' => $response_token, 'data' => $data]);

    }

    public function forgotPassword(array $data)
    {
        $user = User::where('phone', $data['phone'])->first();
        if ($user != null) {
            return response_api(true, 200, 'send successfully', '');

        }else{
            return response_api(false, 500, 'This Phone not found!', '');
        }

    }
    public function forgotPasswordCode(array $data)
    {
        if (App::environment('local')) {
            if ($data['forget_code']== '1234'){
//                $user =  User::where('phone', $data['phone'])->get();
//                dd($user);
                $user->forget_code = $data['forget_code'];
                $user->save();
//            $user->forget_code = $data['forget_code'];
//                 $user->update();
            return response_api(true, 200, 'code successfully', '');

        }else{
            return response_api(false, 500, 'This Phone not found!', '');
        }

    }}
    public function logout(array $data)
    {
        $data->user()->token()->revoke();
        return response_api(true, 200, 'Successfully logged out', '');

    }
    public function profile()
    {
        return response_api(true, 200, 'Profile User',  \auth()->user());
    }
//    public function home()
//    {
//
//
////        $redis = Redis::connection();
//
//            if (!Redis::get('auth')) {
//                $user = auth()->user();
//                Redis::set('auth', json_encode($user));
//            }
//
//            return json_decode(Redis::get('auth'));
////        return $this->UserResource('user info', $user);
//
//
////        $user = isset($id) ? $this->model->find($id) : \auth()->user();
////        return response_api(true, 200, 'Success', new UserResource($user));
//    }

    public function verify(array $data){
        if ($data['verifcation_code']== '1234'){
            $id = auth()->user()->id;
            $user = User::find($id);
            $user->is_verify = true;
            $user->save();
            $data = [
                'status' => true,
                'statusCode' => 200,
                'message' => 'Phone Verified Successfully!',
                'items' => '',

            ];
            return response()->json($data);
//            return response_api(true, 200, 'Phone Verified Successfully!', new UserResource($user));

        }
        $data = [
            'status' => false,
            'statusCode' => 500,
            'message' => 'Bad Verifcation Code!',
            'items' => '',

        ];
        return response()->json($data);
    }

}
