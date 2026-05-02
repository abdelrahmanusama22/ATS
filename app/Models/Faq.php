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

class Faq extends Model
{
<<<<<<< Updated upstream
    use HasFactory, HasTranslations;
=======
    use HasTranslations, LogsActivity;
>>>>>>> Stashed changes

    protected $fillable = [
        'question',
        'answer',
<<<<<<< Updated upstream
        'is_active',
    ];

    public $translatable = ['question', 'answer'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
=======
        'order',
        'is_active',
    ];

    public array $translatable = [
        'question',
        'answer',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['question', 'answer', 'order', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
