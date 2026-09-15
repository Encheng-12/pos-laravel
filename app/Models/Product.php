<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable =['id','cid','name','barcode','cost_price','selling_price','stock_quantity','status'];

    public function categories():BelongsTo{
        return $this->belongsTo(Category::class,'cid','id');
    }
    public function stock_movements():HasMany{
        return $this->hasMany(Stockmovement::class);
    }
    public function order_products():HasMany{
        return $this->hasMany(Order_Product::class);
    }
}
