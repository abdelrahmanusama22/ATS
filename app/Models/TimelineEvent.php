<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TimelineEvent extends Model
{
    use HasTranslations;

    protected $fillable = ['year', 'title', 'description', 'is_active'];
    public $translatable = ['title', 'description'];
}
