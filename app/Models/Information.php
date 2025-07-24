<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = ['title', 'meta_desc', 'slug', 'content', 'status'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
