<?php


namespace App\Repositories\Api;


use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
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

        $add = new Cart();
        $add->user_id = Auth::user()->id;
        $add->quantity = $data['quantity'];
        $add->product_id = $data['product_id'];
        $add->save();
        return response_api(true, 200, 'Add To Cart Successfully!', '');

    }
}

