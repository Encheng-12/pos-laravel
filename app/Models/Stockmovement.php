<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    //
    protected $table = "stock_movements";
    protected $fillable = ["product_id","type","quantity","reference","notes"];

    // public function product(): BelongsTo
    // {
    //     return $this->belongsTo(Product::class,"product_id");
    // }
}
