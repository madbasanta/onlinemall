<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasalCategory extends Model
{
    protected $table ='pasal_category';
    protected $fillable = [
		'id',
		'pasal_id',
		'category_id'
    ];
}
