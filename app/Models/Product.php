<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static Builder public ()
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'published_at' => 'datetime',
        'images' => 'json',
        'meta' => 'json',
    ];

    public function scopePublic(Builder $query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function published()
    {
        return !is_null($this->published_at);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
