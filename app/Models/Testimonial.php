<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasTranslations;

    protected $fillable = [
        'client_name',
        'client_title',
        'client_company',
        'avatar',
        'content',
        'rating',
        'is_active',
        'sort_order',
    ];

    public $translatable = ['client_name', 'client_title', 'content'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
