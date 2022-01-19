<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\AdvEloquent;
use Illuminate\Http\Request;

class AdvController extends Controller
{
    public function __construct(AdvEloquent $advEloquent)
    {
        $this->adv = $advEloquent;
    }
}
