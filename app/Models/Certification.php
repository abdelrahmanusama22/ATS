<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Certification extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'is_active'];
    public $translatable = ['title', 'description'];
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Certification extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public array $translatable = [
        'name',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certification_image')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->nonQueued();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'description', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
