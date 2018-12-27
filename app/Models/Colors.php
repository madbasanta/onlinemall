<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
	   protected $table='colors';
protected $filable = [
		'id',
		 'color', 
		 'is_active'
];
}
