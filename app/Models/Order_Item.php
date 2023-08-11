<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_Item extends Model
{
    protected $guarded = ['id'];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
