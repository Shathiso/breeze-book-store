<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $guarded = ['id'];

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function order_items(): HasMany
    {
        return $this->hasMany(Order_Item::class);
    }
}
