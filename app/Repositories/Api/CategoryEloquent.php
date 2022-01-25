<?php


namespace App\Repositories\Api;


use App\Http\Resources\AdvResource;
use App\Http\Resources\CategoryResource;
use App\Models\Adv;
use App\Models\Category;

class CategoryEloquent
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }
    public function show()
    {
        $category = Category::all();
        $Adv =Adv::where('is_active', 1)->get();
        return response_api(true, 200, 'Success', ['Adv' => AdvResource::collection($Adv),'category' => CategoryResource::collection($category)]);

    }

}
