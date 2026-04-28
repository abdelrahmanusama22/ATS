<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Certification extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'is_active'];
    public $translatable = ['title', 'description'];
}
