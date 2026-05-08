<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'source_language',
        'target_language',
        'service_type',
        'message',
        'attachment',
        'status',
        'admin_notes',
    ];
}
