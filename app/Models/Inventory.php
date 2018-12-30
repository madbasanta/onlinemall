<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\InventoryField;

class Inventory extends Model
{
    use InventoryField;

    protected $table='inventories';
    protected $fillable=[
        'product_id',
        'quantity',
        'price',
        'old_price',
        'discount_id',
        'currency_id',
        'size_id',
        'color_id',
        'brand_id',
        'pasal_id'
    ];
}
