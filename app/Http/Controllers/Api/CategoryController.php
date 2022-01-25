<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\CategoryEloquent;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryEloquent $categoryEloquent)
    {
        $this->category = $categoryEloquent;
    }
    public function show()
    {
        return $this->category->show();
    }
}
