<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{ColorField, CommonTraits};

class Color extends Model
{
	use ColorField, CommonTraits;

	protected $table='colors';
	protected $filable = [
		'color', 
		'is_active'
	];
}
