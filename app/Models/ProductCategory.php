<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'status',
    ];

   public function products()
{
    return $this->hasMany(Product::class, 'category_id');
}
}