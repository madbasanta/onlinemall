<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{PasalCategoryField, CommonTraits};

class PasalCategory extends Model
{
    use PasalCategoryField, CommonTraits;

    protected $table = 'pasal_categories';
    protected $fillable = [
		'pasal_id',
		'category_id'
    ];

    public function pasal() 
    {
    	return $this->belongsTo('App\Models\Pasal');
    }
    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }
}
