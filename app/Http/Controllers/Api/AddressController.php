<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Repositories\Api\AddressEloquent;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(AddressEloquent $addressEloquent)
    {
        $this->address = $addressEloquent;
    }
    public function show()
    {
        return $this->address->show();
    }
    public function addAddress(AddressRequest $request){

        return $this->address->addAddress($request->all());
    }
}
