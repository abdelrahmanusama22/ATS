<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class OrderTrackingEvent extends Model
{
    use HasTranslations, LogsActivity;

    protected $fillable = [
        'order_id',
        'status',
        'location',
        'description',
        'event_date',
        'is_active',
    ];

    public array $translatable = [
        'description',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['order_id', 'status', 'location', 'description', 'event_date', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // ── Relationships ──────────────────────────────────────

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
