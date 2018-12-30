<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BrandField;

class Brand extends Model
{
	use BrandField;
	
    protected $table = 'brands';
	protected $filable = [
		'id',
		'code', 
		'name', 
		'desc',
		'is_active'
	];
}
