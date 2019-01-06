<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{SizeField, CommonTraits};

class Size extends Model
{
	use SizeField, CommonTraits;

    protected $table='sizes';
	protected $filable = [
		'size', 
		'is_active'
	];
}
