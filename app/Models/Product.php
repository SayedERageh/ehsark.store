<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'sale_price',
        'quantity',
        'images',
        'category_id',
        'is_new',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'is_new' => 'boolean',
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(
            ProductCategory::class,
            'category_id'
        );
    }

    /**
     * السعر الحالي للمنتج
     */
    public function getCurrentPriceAttribute()
    {
        return $this->sale_price ?: $this->price;
    }

    /**
     * هل المنتج متاح؟
     */
    public function getIsAvailableAttribute()
    {
        return $this->status && $this->quantity > 0;
    }
}