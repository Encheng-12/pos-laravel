<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Order extends Model
{
    protected $fillable =['id','cashier_id','customer_id','invoice_no','subtotal','tax','discount','status'];

    public function customer():BelongsTo{
        return $this->belongsTo(User::class,'customer_id','id');
    }
    public function payment():HasMany{
        return $this->hasMany(Payment::class);
    }
    public function order_products():HasMany{
        return $this->hasMany(Order_Product::class);
    }
}
