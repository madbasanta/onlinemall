<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\{ProductField, CommonTraits};
use App\Models\Inventory;

class Product extends Model
{
	use ProductField, CommonTraits;

	protected $table = 'products';
	protected $fillable = [
		'code', 
		'name', 
		'desc', 
		'category_id',
	];

	public function inventory() 
	{
		return $this->hasMany('App\Models\Inventory');
	}

	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}
}
