<?php

namespace App\Models;
use App\Models\Inventory;
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


    public function inventory()
    {
        return $this->belongsToMany(Inventory::class,'order_inventory','order_id','inventory_id');
    }

    public function currency () 
    {
    	return $this->belongsTo('App\Models\Currency');
    }

}
