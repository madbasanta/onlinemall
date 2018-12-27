<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table='orders';
    protected $fillable=[
    		  'id',
    		  'inventory_id',
    		  'quantity',
    		  'current_price',
    		  'currency_id',
    		  'is_active'

    ]
}
