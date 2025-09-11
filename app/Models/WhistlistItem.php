<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhistlistItem extends Model
{
    protected $fillable = [
        'whistlist_id',
        'product_id',
        'quantity',
        'price_at_add',
        'discount_at_add'
    ];

    public function whistlist()
    {
        return $this->belongsTo(Whistlist::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
