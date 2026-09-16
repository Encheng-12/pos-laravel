<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
class Payment extends Model
{
    //
    protected $table = "payments";
    protected $fillable = ["order_id","payment_method","amount","reference_no","paid_at"];

        public function order(): BelongsTo{
        return $this->belongsTo(Order::class,"order_id");   
}

}
