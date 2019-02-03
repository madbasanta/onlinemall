<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{ShippingAddressField, CommonTraits};

class ShippingAddress extends Model
{
    use ShippingAddressField, CommonTraits;
    
    protected $table='shipping_addresses';
    protected $fillable= [
		'product_id',
		'address_id',
		'shipping_charge',
		'currency_id',
		'is_active',
    ];
}
