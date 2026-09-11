<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_Product extends Model
{
    protected $table = "order_product";
    protected $fillable = ['order_id', 'product_id', 'quantity', 'unit_price', 'discount', 'amount'];

    public function products(): BelongsTo{
        return $this->belongsTo(Product::class);
    }

    public function orders(): BelongsTo{
        return $this->belongsTo(Order::class);
    }
}
