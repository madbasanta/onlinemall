<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table='inventory';
    protected $fillable=[
    		  'id',
    		  'product_id',
    		  'quantity',
    		  'price',
    		  'old_price',
    		  'discount_id',
    		  'currency_id',
    		  'size_id',
    		  'color_id',
    		  'brand_id',
    		  'pasal_id'
    ];
}
