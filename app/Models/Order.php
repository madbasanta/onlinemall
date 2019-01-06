<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{OrderField, CommonTraits};

class Order extends Model
{
	use OrderField, CommonTraits;
	
    protected $table = 'orders';
    protected $fillable = [
		'id',
		'inventory_id',
		'quantity',
		'current_price',
		'currency_id',
		'is_active'
	];
}
