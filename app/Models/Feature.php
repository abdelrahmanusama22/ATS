<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasTranslations;

    protected $fillable = ['section', 'title', 'description', 'icon_svg', 'is_active'];
    public $translatable = ['title', 'description'];
}
