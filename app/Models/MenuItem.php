<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class MenuItem extends Model
{
    use HasTranslations;

    protected $fillable = ['menu_id', 'title', 'url', 'page_id', 'order', 'target', 'is_active'];

    public $translatable = ['title'];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
