<?php

namespace App\Models;

use App\Support\Translateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    use HasFactory;

    use Translateable;
//    protected $primaryKey = 'adv_id';

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(AdvTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(AdvTranslation::class)->where('language', '=', $language);
    }

//to get all translation for model
    public function translationAllLang()
    {
        return $this->hasMany(AdvTranslation::class);
    }
}
