<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Language extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'code',
        'flag',
        'description',
        'is_active',
        'sort_order',
    ];

    public $translatable = ['name', 'description'];
}
