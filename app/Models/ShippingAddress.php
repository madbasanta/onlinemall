<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ShippingAddressField;

class ShippingAddress extends Model
{
    use ShippingAddressField;
    
    protected $table='shipping_addresses';
    protected $fillable=[
		'id',
		'product_id',
		'address_id',
		'shipping_charge',
		'currency_id',
		'is_active',
    ];
}
