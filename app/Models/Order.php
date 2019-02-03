<?php

namespace App\Models;
use App\Models\{Inventory, Address};
use Illuminate\Database\Eloquent\Model;
use App\Traits\{OrderField, CommonTraits};

class Order extends Model
{
	use OrderField, CommonTraits;
	
    protected $table = 'orders';
    protected $fillable = [
		'id',
		'quantity',
		'current_price',
		'currency_id',
		'is_active'
	];
    protected $appends = ['status'];

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class,'order_inventory','order_id','inventory_id');
    }

    public function address() {
        return $this->belongsToMany(Address::class, 'shipping_addresses', 'order_id', 'address_id');
    }

    public static function getSales() {
        $orders = static::where('shipped', 1)->get();
        return $orders->reduce(function($total, $order) {
            return $total + $order->inventories()->sum('order_inventory.quantity');
        }, 0);
    }
}
