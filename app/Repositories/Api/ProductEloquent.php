<?php


namespace App\Repositories\Api;


use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Rate;
use Illuminate\Support\Facades\App;

class ProductEloquent
{
    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

//    public function get($id){
//
//        $product = $this->model->find($id);
//
//        return response_api(true,200,null,new ProductResource($product));
//    }
    public function show()
    {
        $page_number = intval(\request()->get('page_number'));
        $page_size = \request()->get('page_size');
        $total_records = Product::count();
        $total_pages = ceil($total_records / $page_size);
        $product = Product::skip(($page_number - 1) * $page_size)
            ->take($page_size)->get();
        return response_api(true, 200, 'Success',
            ['data' => ProductResource::collection($product), "page_number" => $page_number,
                "total_pages" => $total_pages, "total_records" => $total_records
            ]);


    }


    public function store($id)
    {

        $product = Product::find($id);
;
//        $product = Product::where('name', $data['name'])->first();
//        $avgStar = Rate::where('product_id', 'product_id')->get();
//dd($avgStar);
//        $similar=Product::where('category_id', 'category_id')->get();
//        dd($similar);

        if ($product != null) {
            return response_api(true, 200, 'Success', [new ProductResource($product)]);

        } else {
            return response_api(false, 500, 'There is no product with this name!', '');
        }

    }
}
