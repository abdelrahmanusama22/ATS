<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'slug', 'is_active'];

    public $translatable = ['name', 'slug'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function products(): HasMany
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    public array $translatable = [
        'name',
        'slug',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category_image')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->nonQueued();

        $this->addMediaConversion('thumbnail')
            ->format('webp')
            ->width(300)
            ->height(300)
            ->quality(80)
            ->nonQueued();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'slug', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // ── Relationships ──────────────────────────────────────

    public function products()
>>>>>>> Stashed changes
    {
        return $this->hasMany(Product::class);
    }
}
