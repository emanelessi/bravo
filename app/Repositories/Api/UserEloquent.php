<?php


namespace App\Repositories\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
            return response_api(false, $statusCode, $response->message, $response);

        $response_token = $response;
        $token = $response->access_token;
        \request()->headers->set('Authorization', 'Bearer ' . $token);

        $proxy = Request::create('api/home', 'GET');

        $response = Route::dispatch($proxy);

        $statusCode = $response->getStatusCode();
        $user = json_decode($response->getContent())->items;
        return response_api(true, $statusCode, 'Successfully Login', ['token' => $response_token, 'user' => $user]);

    }

    public function home($id = null)
    {
        $user = isset($id) ? $this->model->find($id) : \auth()->user();
        return response_api(true, 200, 'Success', new UserResource($user));
    }
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
