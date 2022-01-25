<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Repositories\Api\FavoriteEloquent;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct(FavoriteEloquent $favoriteEloquent)
    {
        $this->favorite = $favoriteEloquent;
    }
    public function favorite(){
        return $this->favorite->favorite();
    }
    public function addFavorites(FavoriteRequest $request){

        return $this->favorite->addFavorites($request->all());
    }
}
