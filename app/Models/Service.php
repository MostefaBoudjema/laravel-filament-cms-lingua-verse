<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'image',
        'features',
        'is_active',
        'sort_order',
    ];

    public $translatable = ['title', 'description', 'features'];
}
