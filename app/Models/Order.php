<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['id','cashier_id','customer_id','invoice_no','subtotal','tax','discount','status'];
}
