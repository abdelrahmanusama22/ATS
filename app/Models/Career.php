<?php

namespace App\Models;

<<<<<<< Updated upstream
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
>>>>>>> Stashed changes
use Spatie\Translatable\HasTranslations;

class Career extends Model
{
<<<<<<< Updated upstream
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'location',
        'salary',
        'type',
        'closing_date',
        'is_active',
    ];

    public $translatable = ['title', 'description', 'requirements', 'location'];

    protected $casts = [
        'is_active' => 'boolean',
        'closing_date' => 'date',
    ];
=======
    use HasTranslations, LogsActivity;

    protected $fillable = [
        'title',
        'location',
        'type',
        'salary',
        'description',
        'requirements',
        'is_active',
    ];

    public array $translatable = [
        'title',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'requirements' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'location', 'type', 'salary', 'description', 'requirements', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
