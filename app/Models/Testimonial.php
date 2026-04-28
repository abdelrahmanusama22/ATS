<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimonial extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = ['client_name', 'company_role', 'content', 'rating', 'is_active'];
    public $translatable = ['client_name', 'company_role', 'content'];
}
