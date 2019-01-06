<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{ProductField, CommonTraits};

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
}
