<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Repositories\Api\LanguageEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function __construct(LanguageEloquent $languageEloquent)
    {
        $this->language = $languageEloquent;
    }

}
