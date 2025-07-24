<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relasi many to one ke tabel products
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
