<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProductField;

class Product extends Model
{
	use ProductField;

	protected $table = 'products';
	protected $filable = [
		'code', 
		'name', 
		'desc', 
		'category_id',
	];
}
