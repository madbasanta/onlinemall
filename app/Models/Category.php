<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{CategoryField, CommonTraits};

class Category extends Model
{
	use CategoryField, CommonTraits;

    protected $table = 'categories';
    protected $fillable = ['code', 'name', 'desc', 'is_sub', 'parent_id', 'is_active'];


    public function product()
    {
    	return $this->hasMany('App\Models\Category');
    }

}

