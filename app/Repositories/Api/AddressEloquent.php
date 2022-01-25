<?php


namespace App\Repositories\Api;


use App\Http\Resources\AddressResource;
use App\Http\Resources\CategoryResource;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressEloquent
{
    private $model;

    public function __construct(Address $address)
    {
        $this->model = $address;
    }

    public function show()
    {
        $user_id = Auth::user()->address;
        $address = Address::find($user_id);
        return response_api(true, 200, 'Success', ['data' => AddressResource::collection($address)]);

    }

    public function addAddress(array $data)
    {
        $add = new Address();
        $add->user_id = Auth::user()->id;
        $add->type = $data['type'];
        $add->address = $data['address'];
        $add->latitude = $data['latitude'];
        $add->longitude = $data['longitude'];
        $add->save();
        return response_api(true, 200, 'Successfully addAddress!', ['data' => new AddressResource($add)]);

    }

}
