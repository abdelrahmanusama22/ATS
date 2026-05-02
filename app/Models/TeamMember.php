<?php

namespace App\Models;

<<<<<<< Updated upstream
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TeamMember extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'name',
        'role',
=======
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'name',
        'position',
>>>>>>> Stashed changes
        'bio',
        'is_active',
    ];

<<<<<<< Updated upstream
    public $translatable = ['name', 'role', 'bio'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
=======
    public array $translatable = [
        'name',
        'position',
        'bio',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->nonQueued();

        $this->addMediaConversion('avatar')
            ->format('webp')
            ->width(300)
            ->height(300)
            ->quality(80)
            ->nonQueued();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'position', 'bio', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
