<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relasi many to one ke tabel portofolio
    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
