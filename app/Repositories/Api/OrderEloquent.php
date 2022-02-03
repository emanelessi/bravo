<?php


namespace App\Repositories\Api;


use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderEloquent
{
    private $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function show()
    {
        $order = Order::where('user_id', Auth::user()->id)->get();
        return response_api(true, 200, 'Success', ['data' => OrderResource::collection($order)]);
    }


    public function store($id)
    {
        $order = Order::find($id);
        if ($order != null) {
            return response_api(true, 200, 'Success', [new OrderResource($order)]);

        } else {
            return response_api(false, 500, 'There is no product with this name!', '');
        }

    }

    public function CheckOut(array $data)
    {
        $add = new Order();
        $add->user_id = Auth::user()->id;
        $add->quantity = $data['quantity'];
        $add->product_id = $data['product_id'];
        $add->address = $data['address'];
        $add->latitude = $data['latitude'];
        $add->longitude = $data['longitude'];
        $add->save();
        return response_api(true, 200, 'CheckOut Successfully!', '');

    }
}
