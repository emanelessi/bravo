<?php


namespace App\Repositories\Api;


use App\Http\Resources\LanguageResource;
use App\Models\Languages;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageEloquent
{
    private $model;

    public function __construct(Languages $language)
    {
        $this->model = $language;
    }
}
