<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{
    
       protected $table='shipping_address';
    protected $fillable=[
    		  'id',
    		  'product_id',
    		  'address_id',
    		  'shipping_charge',
    		  'currency_id',
    		  'is_active',

    ]
}
