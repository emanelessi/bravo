<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\LanguageEloquent;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct(LanguageEloquent $languageEloquent)
    {
        $this->language = $languageEloquent;
    }
}
