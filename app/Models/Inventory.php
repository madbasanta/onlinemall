<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\{InventoryField, CommonTraits};
use App\Models\Product;
use App\Models\Order;
use App\Models\Discount;

class Inventory extends Model
{
    use InventoryField, CommonTraits;

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

    public function orders()
    {
        //many to many relation ship bettwen order and inventory tables
        return $this->belongsToMany(Order::class,'order_inventory','inventory_id','order_id');
    }

    public function product()
        {
            return $this->belongsTo('App\Models\Product');  
        }

    public function discount()
        {
            return $this->belongsTo('App\Models\Discount');
        }
    
    public function color()
        {
           return $this->belongsTo('App\Models\Color');
        } 
    public function size()
        {
            return $this->belongsTo('App\Models\Size');
        }

     public function brand()
         {
             return $this->belongsTo('App\Models\Brand');
         }

     public function pasal()
         {
             return $this->belongsTo('App\Models\Pasal');
         }  

    public function currency()
         {
             return $this->belongsTo('App\Models\Currency');
         }
}
