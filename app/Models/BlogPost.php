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

    public function getCoverMeta(): array
    {
        $map = [
            'comment-choisir-logiciel-facturation-tunisie' => ['icon' => 'checklist', 'from' => '#006B59', 'to' => '#00C1A3'],
            'guide-tva-tunisie' => ['icon' => 'percent', 'from' => '#1565C0', 'to' => '#42A5F5'],
            'fodec-tunisie-guide' => ['icon' => 'precision_manufacturing', 'from' => '#00695C', 'to' => '#26A69A'],
            'declaration-tej-guide-pratique' => ['icon' => 'verified', 'from' => '#6A1B9A', 'to' => '#AB47BC'],
            'facturation-electronique-tunisie-elfatoora' => ['icon' => 'bolt', 'from' => '#283593', 'to' => '#5C6BC0'],
            'retenue-source-tunisie-guide' => ['icon' => 'account_balance', 'from' => '#E65100', 'to' => '#FF9800'],
            'gestion-stock-pme-tunisie' => ['icon' => 'inventory_2', 'from' => '#BF360C', 'to' => '#FF7043'],
            'creer-facture-conforme-tunisie' => ['icon' => 'receipt_long', 'from' => '#2E7D32', 'to' => '#66BB6A'],
            'timbre-fiscal-tunisie' => ['icon' => 'approval', 'from' => '#C62828', 'to' => '#EF5350'],
            'comparatif-logiciel-facturation-gratuit-vs-payant' => ['icon' => 'compare', 'from' => '#0277BD', 'to' => '#29B6F6'],
            'top-5-logiciels-facturation-tunisie-2026' => ['icon' => 'emoji_events', 'from' => '#F57F17', 'to' => '#FFCA28'],
            'migration-excel-vers-logiciel-facturation-tunisie' => ['icon' => 'swap_horiz', 'from' => '#1B5E20', 'to' => '#4CAF50'],
            'softyfact-bureau-vs-cloud-comparatif' => ['icon' => 'cloud_sync', 'from' => '#0097A7', 'to' => '#4DD0E1'],
        ];

        return $map[$this->slug] ?? ['icon' => 'article', 'from' => '#006B59', 'to' => '#00C1A3'];
    }
}
