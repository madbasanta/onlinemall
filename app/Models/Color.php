<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ColorField;

class Color extends Model
{
	use ColorField;

	protected $table='colors';
	protected $filable = [
		'color', 
		'is_active'
	];
}
