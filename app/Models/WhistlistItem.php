<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhistlistItem extends Model
{
    protected $fillable = [
        'whistlist_id',
        'portofolio_id',
        'price_at_add',
        'discount_at_add'
    ];

    public function whistlist()
    {
        return $this->belongsTo(Whistlist::class);
    }

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }
}
