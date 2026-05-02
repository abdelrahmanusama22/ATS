<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
>>>>>>> Stashed changes
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
<<<<<<< Updated upstream
    use HasTranslations;

    protected $fillable = ['section', 'title', 'description', 'icon_svg', 'is_active'];
    public $translatable = ['title', 'description'];
=======
    use HasTranslations, LogsActivity;

    protected $fillable = [
        'title',
        'description',
        'icon_class',
        'is_active',
    ];

    public array $translatable = [
        'title',
        'description',
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
            ->logOnly(['title', 'description', 'icon_class', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
