<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'user_id',
        'name', 
        'email',
        'image', 
        'content', 
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
