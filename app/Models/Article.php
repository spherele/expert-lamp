<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'active',
        'preview_text',
        'preview_picture',
        'detail_text',
        'detail_picture',
        'tags',
        'category_id',
        'published_at',
    ];
    protected $casts = [
        'active' => 'boolean',
        'tags' => 'json',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(ArticlesCategory::class, 'category_id');
    }
}
