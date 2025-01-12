<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'title',
        'preview_text',
        'content',
        'preview_picture',
        'image',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
