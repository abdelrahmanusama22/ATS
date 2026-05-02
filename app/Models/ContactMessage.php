<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream

class ContactMessage extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'status', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ContactMessage extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'phone', 'subject', 'message', 'is_read', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
>>>>>>> Stashed changes
}
