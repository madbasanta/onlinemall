<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CartField;

class Cart extends Model
{
    use CartField;
    
    protected $table ='carts';
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
