<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $fillable = [
        'user_id',
        'website_category_id',
        'title',
        'meta_desc',
        'slug',
        'content',
        'image',
        'status',
        'price',
        'discount',
        'sku',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relasi Many-to-One dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many-to-One dengan Category
    public function website_category()
    {
        return $this->belongsTo(WebsiteCategory::class);
    }
}