<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
