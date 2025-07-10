<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GeneralArticle extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'summary',
        'content',
    ];

    // Membuat slug secara otomatis setiap kali judul disimpan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });

        static::updating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }
}