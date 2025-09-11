<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whistlist extends Model
{
    protected $fillable = ['user_id', 'session_id'];

    public function items()
    {
        return $this->hasMany(WhistlistItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
