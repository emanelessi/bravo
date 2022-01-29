<?php


namespace App\Repositories\Api;


use App\Http\Resources\RateResource;
use App\Models\Rate;
use Illuminate\Http\Resources\Json\JsonResource;

class RateEloquent
{
    private $model;

    public function __construct(Rate $rate)
    {
        $this->model = $rate;
    }

    public function rate(array $data)
    {
        $rating = Rate::where('user_id', auth()->user()->id)->where('product_id', $data['product_id'])->first();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->product_id =$data['product_id'];
            $rating->rate =  $data['rate'];
            $rating->update();
            return response_api(true, 200, 'updating Rate!',  ['data' => new RateResource($rating)]);

        } else {
            $rating = new Rate;
            $rating->user_id = auth()->user()->id;
            $rating->product_id =$data['product_id'];
            $rating->rate =  $data['rate'];
            $rating->save();
            return response_api(true, 200, 'Success Save!',  ['data' => new RateResource($rating)]);

        }
    }
}
