<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
>>>>>>> Stashed changes
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
<<<<<<< Updated upstream
    use HasTranslations;

    protected $fillable = ['title', 'slug', 'content', 'meta_description', 'is_active'];

    public $translatable = ['title', 'slug', 'content', 'meta_description'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
=======
    use HasTranslations, LogsActivity;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'seo_title',
        'seo_description',
        'is_active',
    ];

    public array $translatable = [
        'title',
        'content',
        'seo_title',
        'seo_description',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['slug', 'title', 'content', 'seo_title', 'seo_description', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
