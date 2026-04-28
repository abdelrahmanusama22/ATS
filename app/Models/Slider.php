<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'subtitle', 'image_path', 'button_text', 'link', 'order', 'is_active'];

    public $translatable = ['title', 'subtitle', 'button_text'];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
