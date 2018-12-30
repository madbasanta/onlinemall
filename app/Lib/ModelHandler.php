<?php
namespace App\Lib;

use App\User;
use App\Models;

class ModelHandler
{
	public static $models = [
		'users' => User::class,
		'addresses' => Models\Address::class,
		'brands' => Models\Brand::class,
		'categories' => Models\Category::class,
		'carts' => Models\Cart::class,
		'colors' => Models\Color::class,
		'currencies' => Models\Currency::class,
		'discounts' => Models\Discount::class,
		'inventories' => Models\Inventory::class,
		'orders' => Models\Order::class,
		'pasals' => Models\Pasal::class,
		'products' => Models\Product::class,
		'shipping_addresses' => Models\ShippingAddress::class,
		'sizes' => Models\Size::class,
	];

	public static $pivots = [
		[ 'table' => 'pasal_address', 'model' => Models\PasalAddress::class ],
		[ 'table' => 'pasal_category', 'model' => Models\PasalCategory::class ],
		[ 'table' => 'user_address', 'model' => Models\UserAddress::class ],
	];

	public static function getObject($model)
	{
		if(isset(static::$models[$model])) return new static::$models[$model]();
		return null; 
	}
}