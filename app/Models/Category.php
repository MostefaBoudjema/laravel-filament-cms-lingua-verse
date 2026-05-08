<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public $translatable = ['name', 'description'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
