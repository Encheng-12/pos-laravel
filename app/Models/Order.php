<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Order extends Model
{
    protected $fillable =['cashier_id','customer_id','invoice_no','subtotal','tax','discount','status'];

    public function users():BelongTo{
        return $this->belongsTo(User::class);
    }
    public function payment():HasMany{
        return $this->hasMany(Payment::class);
    }
}
