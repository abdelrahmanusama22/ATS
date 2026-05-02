<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
>>>>>>> Stashed changes
use Spatie\Translatable\HasTranslations;

class TimelineEvent extends Model
{
<<<<<<< Updated upstream
    use HasTranslations;

    protected $fillable = ['year', 'title', 'description', 'is_active'];
    public $translatable = ['title', 'description'];
=======
    use HasTranslations, LogsActivity;

    protected $fillable = [
        'year',
        'title',
        'description',
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
            ->logOnly(['year', 'title', 'description', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
