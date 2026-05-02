<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
use Illuminate\Database\Eloquent\Relations\BelongsTo;
=======
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
>>>>>>> Stashed changes
use Spatie\Translatable\HasTranslations;

class MenuItem extends Model
{
<<<<<<< Updated upstream
    use HasTranslations;

    protected $fillable = ['menu_id', 'title', 'url', 'page_id', 'order', 'target', 'is_active'];

    public $translatable = ['title'];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function menu(): BelongsTo
=======
    use HasTranslations, LogsActivity;

    protected $fillable = [
        'menu_id',
        'title',
        'url',
        'page_id',
        'icon_svg',
        'order',
        'target',
        'is_active',
    ];

    public array $translatable = [
        'title',
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
            ->logOnly(['menu_id', 'title', 'url', 'page_id', 'order', 'target', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // ── Relationships ──────────────────────────────────────

    public function menu()
>>>>>>> Stashed changes
    {
        return $this->belongsTo(Menu::class);
    }

<<<<<<< Updated upstream
    public function page(): BelongsTo
=======
    public function page()
>>>>>>> Stashed changes
    {
        return $this->belongsTo(Page::class);
    }
}
