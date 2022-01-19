<?php


namespace App\Repositories\Api;


use App\Models\Languages;

class LanguageEloquent
{
    private $model;

    public function __construct(Languages $language)
    {
        $this->model = $language;
    }
}
