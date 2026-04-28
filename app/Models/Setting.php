<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    protected $fillable = ['key', 'value', 'type', 'is_active'];

    public $translatable = ['value'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
