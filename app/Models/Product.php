<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'book_count', 'price',
        'is_active', 'is_featured', 'sort_order', 'download_url',
        'cover_image', 'cover_image_path', 'image_alt', 'image_title'
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', true)->orderBy('sort_order');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(Order::class, OrderItem::class,
            'product_id',
            'id',
            'id',
            'order_id'
        );
    }

    public function getPriceFormattedAttribute(): string
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        if (!$this->cover_image_path) {
            return null;
        }
        return '/storage/products/' . $this->cover_image_path;
    }

    protected static function booted(): void
    {
        static::deleting(function (Product $product) {
            if ($product->cover_image_path && file_exists(storage_path('app/public/products/' . $product->cover_image_path))) {
                unlink(storage_path('app/public/products/' . $product->cover_image_path));
            }
        });
    }
}