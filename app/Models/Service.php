<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'icon_class', 'is_active'];

    public $translatable = ['title', 'description'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
