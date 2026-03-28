<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'slug', 'title_fr', 'title_ar', 'excerpt_fr', 'excerpt_ar',
        'body_fr', 'body_ar', 'meta_description_fr', 'meta_description_ar',
        'meta_keywords', 'cover_image', 'reading_time', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'reading_time' => 'integer',
        ];
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function getTitle(): string
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_fr;
    }

    public function getExcerpt(): string
    {
        return app()->getLocale() === 'ar' ? $this->excerpt_ar : $this->excerpt_fr;
    }

    public function getBody(): string
    {
        return app()->getLocale() === 'ar' ? $this->body_ar : $this->body_fr;
    }

    public function getMetaDescription(): string
    {
        return app()->getLocale() === 'ar' ? $this->meta_description_ar : $this->meta_description_fr;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
