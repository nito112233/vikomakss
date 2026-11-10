<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['slug', 'title', 'summary', 'description', 'image', 'category', 'services', 'location', 'area', 'airflow', 'cooling', 'is_featured', 'sort_order', 'published_at', 'source_url'])]
class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'summary' => 'array',
            'description' => 'array',
            'services' => 'array',
            'is_featured' => 'boolean',
            'published_at' => 'datetime',
            'area' => 'integer',
            'airflow' => 'float',
            'cooling' => 'integer',
        ];
    }

    public function translation(string $field, ?string $locale = null): string
    {
        $values = $this->getAttribute($field);

        return $values[$locale ?? app()->getLocale()] ?? $values['lv'] ?? '';
    }

    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }
}
