<?php


namespace App\Repositories\Api;


use App\Http\Resources\LanguageResource;
use App\Models\Languages;

class LanguageEloquent
{
    private $model;

    public function __construct(Languages $language)
    {
        $this->model = $language;
    }
    public function addLang(array $data)
    {
        $add = new Languages();
        $add->language = $data['language'];
        $add->save();
        return response_api(true, 200, 'Successfully addlanguage!', ['data' => new LanguageResource($add)]);

    }
}
