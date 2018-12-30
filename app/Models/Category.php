<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CategoryField;

class Category extends Model
{
	use CategoryField;

    protected $table = 'categories';
    protected $fillable = ['code', 'name', 'desc', 'is_sub', 'parent_id', 'is_active'];
}
