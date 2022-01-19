<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\FavoriteEloquent;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct(FavoriteEloquent $favoriteEloquent)
    {
        $this->favorite = $favoriteEloquent;
    }
}
