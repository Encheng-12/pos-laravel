<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_Product extends Model
{
    protected $table = "order_product";
    protected $fillable = ['order_id', 'product_id', 'quantity', 'unit_price', 'discount', 'amount'];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Automatically update parent order totals on save or delete
     */
    // protected static function booted(): void
    // {
    //     // Triggers whenever a line item is created or updated
    //     static::saved(function (Order_Product $orderProduct) {
    //         $orderProduct->updateParentOrderTotals();
    //     });

    //     // Triggers whenever a line item is deleted
    //     static::deleted(function (Order_Product $orderProduct) {
    //         $orderProduct->updateParentOrderTotals();
    //     });
    // }

    /**
     * Helper method to recalculate parent order
     */
    // public function updateParentOrderTotals(): void
    // {
    //     $order = Order::find($this->order_id);

    //     if ($order) {
    //         $order->recalculateTotals();
    //     }
    // }
}