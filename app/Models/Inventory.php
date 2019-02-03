<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\{InventoryField, CommonTraits};
use App\Models\{Product, Order, Discount, File};

class Inventory extends Model
{
    use InventoryField, CommonTraits;

    protected $table = 'inventories';
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
        return $this->belongsToMany(Order::class, 'order_inventory', 'inventory_id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');  
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

    public function getCurrenctPrice() {
        if($discount = $this->discount) {
            if ($discount->amount) {
                return $this->price - $discount->amount;
            } else if ($discount->percent) {
                return $this->price * ((100 - $discount->percent) / 100);
            }
        }
        return $this->price;
    }

    public function files() {
        return $this->hasMany(File::class, 'table_id')->where('table_name', 'inventories');
    }
}
