<?php


namespace App\Repositories\Api;

use App\Http\Resources\FavoriteResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
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
        $input = $data['phone'];
        $validator = Validator::make([$input], [
            'phone' => "required"
        ]);

//        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $response = Password::sendResetLink($input);
        $message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' : 'SOMETHING_WRONG';
        if ($message== 'SOMETHING_WRONG'){
            return response_api(false, 400, '$message', '');
        }
        if ($message== 'Mail send successfully'){
            return response_api(true, 200, '$message', '');

        }
        return response()->json($data);
    }
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
