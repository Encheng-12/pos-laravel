<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable =['cid','name','barcode','cost_price','selling_price','stock_quantity','status',];

    public function categories():BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function stockmovements():HasMany{
        return $this->hasMany(Stockmovement::class);
    }
    public function orderproducts():HasMany{
        return $this->hasMany(Order_Product::class);
    }
}
