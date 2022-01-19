<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\AddressEloquent;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(AddressEloquent $addressEloquent)
    {
        $this->address = $addressEloquent;
    }

}
