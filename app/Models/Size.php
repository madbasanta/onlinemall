<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SizeField;

class Size extends Model
{
	use SizeField;

    protected $table='sizes';
	protected $filable = [
		'size', 
		'is_active'
	];
}
