<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'status',
    ];

    // Virtual attribute so $order->total works everywhere without a database column
    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->subtotal + $this->tax) - $this->discount,
        );
    }

    protected $appends = ['total'];

    // Calculate subtotal from items and save it
    public function recalculateTotals()
    {
        // Sum up the amount from all related order_products
        $subtotal = $this->order_products()->sum('amount');
        $discount = $this->discount ?? 0;

        // Update subtotal in the database (cast to integer to match DB schema)
        $this->update([
            'subtotal' => (int) round($subtotal),
        ]);
    }

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
}