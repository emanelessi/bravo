<?php


namespace App\Repositories\Api;


use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteEloquent
{
    private $model;

    public function __construct(Favorite $favorite)
    {
        $this->model = $favorite;
    }

    public function favorite()
    {
        $user_id=Auth::user()->favorite;
        $favorite = Favorite::find($user_id);
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
