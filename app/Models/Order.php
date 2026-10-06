<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'id',
        'cashier_id',
        'customer_id',
        'invoice_no',
        'subtotal',
        'tax',
        'discount',
        'total',
        'status',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(Order_Product::class, 'order_id');
    }

    /**
     * Recalculate subtotal, discount, and total directly from line items
     * and update the orders table.
     */
    // public function recalculateTotals()
    // {
    //     $this->load('order_products');

    //     // Sum (quantity * unit_price) from line items
    //     $subtotal = $this->order_products->sum(function ($item) {
    //         return ($item->quantity ?? 1) * ($item->unit_price ?? 0);
    //     });

    //     // Sum discounts from line items
    //     $discount = $this->order_products->sum('discount');
    //     $tax = $this->tax ?? 0;
        
    //     // Final total formula: Subtotal - Discount + Tax
    //     $total = max(0, $subtotal - $discount + $tax);

    //     // Save summarized values directly to the order row
    //     $this->update([
    //         'subtotal' => $subtotal,
    //         'discount' => $discount,
    //         'total'    => $total,
    //     ]);

    //     return $this;
    // }
}