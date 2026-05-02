<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    protected $fillable = ['key', 'value', 'type', 'is_active'];

    public $translatable = ['value'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use LogsActivity;

    protected $fillable = [
        'key',
        'value',
        'type',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'json',
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['key', 'value', 'type', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
