<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    
    protected $table ='addresses';
    protected $fillable = [
    		  'id',
    		   'user_id',
    		   'inventory_id',
    		  'quantity',
    		  'current_price',
    		  'currency_id',
    		  'is_active'
    ];
}
