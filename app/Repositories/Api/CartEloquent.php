<?php


namespace App\Repositories\Api;


use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CartEloquent
{
    private $model;

    public function __construct(Cart $cart)
    {
        $this->model = $cart;
    }
    public function show()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return response_api(true, 200, 'Success', ['data' => CartResource::collection($cart)]);

    }
    public function addToCart(array $data)
    {
//        $product = Product::findOrFail($data['id']);
//        $cart = session()->get('cart', []);
//
//        if(isset($cart[$data['id']])) {
//            $cart[$data['id']]['quantity']++;
//        } else {
//            $cart[$data['id']] = [
//                "name" => $product->name,
//                "quantity" => 1,
//                "price" => $product->price,
//                "image" => $product->image
//            ];
//        }
//
//        session()->put('cart', $cart);
//        return response_api(true, 200, 'Add To Cart Successfully!','');
        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $data['product_id'])->first();
        if (!empty($cart)) {
            $cart->user_id = Auth::user()->id;
            $cart->quantity = $data['quantity'];
            $cart->product_id = $data['product_id'];
            $cart->update();
            return response_api(true, 200, 'updating Successfully!',  ['data' => new CartResource($cart)]);

        } else {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->quantity = $data['quantity'];
            $cart->product_id = $data['product_id'];
            $cart->save();
            return response_api(true, 200, 'Add To Cart Successfully!', ['data' => new CartResource($cart)]);
        }

    }
}

