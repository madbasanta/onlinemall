<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $table='product';
protected $filable = [
		'id',
		 'code', 
		 'name', 
		 'desc', 
		 'category_id',		
		 'is_active'
];
}
