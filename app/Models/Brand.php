<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{BrandField, CommonTraits};

class Brand extends Model
{
	use BrandField, CommonTraits;
	
    protected $table = 'brands';
	protected $filable = [
		'code', 
		'name', 
		'desc',
		'is_active'
	];
}
