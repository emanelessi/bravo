<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Repositories\Api\LanguageEloquent;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct(LanguageEloquent $languageEloquent)
    {
        $this->language = $languageEloquent;
    }
    public function addLang(LanguageRequest $request){

        return $this->language->addLang($request->all());
    }
}
