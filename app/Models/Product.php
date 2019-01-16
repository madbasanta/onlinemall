<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{ProductField, CommonTraits};
use App\Models\Category;
use App\Models\Inventory;

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

	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}


	public function inventory() 
	{
		return $this->hasMany('App\Models\Inventory');
	}

	public function setCodeAttribute() {
		$this->attributes['code'] = ''; 
	}

	public function save(array $options = array()) {
		foreach($options as $key => $data):
			$this->$key = $data;
		endforeach;
		parent::save();
		$this->attributes['code'] = $this->category->code . '-' . $this->id;
		parent::save();
	}
}
