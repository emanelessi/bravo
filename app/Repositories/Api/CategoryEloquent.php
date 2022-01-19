<?php


namespace App\Repositories\Api;


use App\Models\Category;

class CategoryEloquent
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
