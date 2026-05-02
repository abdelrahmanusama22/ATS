<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class ProductVariant extends Model
{
    use HasTranslations, LogsActivity;

    protected $fillable = [
        'product_id',
        'attribute_name',
        'attribute_value',
        'price_adjustment',
        'stock',
        'is_active',
    ];

    public array $translatable = [
        'attribute_name',
        'attribute_value',
    ];

    protected function casts(): array
    {
        return [
            'price_adjustment' => 'decimal:2',
            'stock' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['product_id', 'attribute_name', 'attribute_value', 'price_adjustment', 'stock', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // ── Relationships ──────────────────────────────────────

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
