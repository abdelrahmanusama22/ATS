<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ContentBlock extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = ['key', 'group', 'type', 'content', 'link', 'is_active'];
    public $translatable = ['content'];
}
