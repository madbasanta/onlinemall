<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{AddressField, CommonTraits};
use App\Models\Order;

class Address extends Model
{
    use AddressField, CommonTraits;
    
    protected $table = 'addresses';
    protected $fillable = [
        'id',
        'add1',
        'add2',
        'city',
        'zip',
        'state',
        'country',
        'is_active'
    ];

    public function orders() {
        return $this->belongsToMany(Order::class, 'shipping_addresses', 'address_id', 'order_id');
    }

    public function full_address() {
        return sprintf(
            '%s, <br> %s, <br> %s %s %s, <br> %s',
            $this->add1, $this->add2, $this->city, $this->state, $this->zip, $this->country
        );
    }
}
