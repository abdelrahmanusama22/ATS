<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'views_count', 'orders_count', 'is_active'];

    public $translatable = ['name', 'description'];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'views_count' => 'integer',
        'orders_count' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'category_id',
        'sku',
        'name',
        'description',
        'price',
        'sale_price',
        'brand',
        'stock',
        'stock_status',
        'features_list',
        'specifications',
        'seo_title',
        'seo_description',
        'views_count',
        'is_active',
    ];

    public array $translatable = [
        'name',
        'description',
        'stock_status',
        'seo_title',
        'seo_description',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'stock' => 'integer',
            'features_list' => 'array',
            'specifications' => 'array',
            'views_count' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');

        $this->addMediaCollection('thumbnail')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->nonQueued();

        $this->addMediaConversion('thumbnail')
            ->format('webp')
            ->width(400)
            ->height(400)
            ->quality(80)
            ->nonQueued();

        $this->addMediaConversion('preview')
            ->format('webp')
            ->width(800)
            ->height(800)
            ->quality(85)
            ->nonQueued();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'category_id', 'sku', 'name', 'description', 'price', 'sale_price',
                'brand', 'stock', 'stock_status', 'features_list', 'specifications',
                'seo_title', 'seo_description', 'is_active',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // ── Relationships ──────────────────────────────────────

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
>>>>>>> Stashed changes
}
