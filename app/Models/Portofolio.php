<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{

    protected $fillable = [
        'website_category_id',
        'title',
        'meta_desc',
        'content',
        'image',
        'status',
        'client',
        'demo_url',
        'repo_url'
    ];
    // Relasi Many-to-One dengan Category
    public function website_category()
    {
        return $this->belongsTo(WebsiteCategory::class);
    }
}