<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Career extends Model
{
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
}
