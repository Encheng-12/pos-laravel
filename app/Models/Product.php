<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['cid','name','barcode','cost_price','selling_price','stock_quantity','status',];

    public function categories():BelongTo{
        return $this->belongsTo(Category::class);
    }
    public function stockmovements():HasMany{
        return $this->hasMany(Stockmovement::class);
    }
}
