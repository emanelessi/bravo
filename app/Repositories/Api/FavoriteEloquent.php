<?php


namespace App\Repositories\Api;


use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class FavoriteEloquent
{
    private $model;

    public function __construct(Favorite $favorite)
    {
        $this->model = $favorite;
    }

    public function favorite()
    {
        $favorite = Favorite::where('user_id', auth()->user()->id)->get();
        return response_api(true, 200, 'Success', ['data' => FavoriteResource::collection($favorite)]);
    }

    public function addFavorites(array $data)
    {
        $products = Product::find($data['product_id']);
        if ($products != null) {
            $favorite = new Favorite();
            $favorite->user_id = Auth::user()->id;
            $favorite->product_id = $data['product_id'];
            $favorite->save();
            return response_api(true, 200, 'Successfully addFavorites!', ['data' => new FavoriteResource($favorite),]);
        } else {
            return response_api(false, 500, 'There is no product with this id!', '');

        }
    }
}
//if (!Redis::get('auth')) {
//                $user = auth()->user();
//                Redis::set('auth', json_encode($user));
//            }
//
//            return json_decode(Redis::get('auth'));
