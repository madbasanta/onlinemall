<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasalAddress extends Model
{
    protected $table = 'pasal_address';
    protected $fillable = [
		'id',
		'pasal_id',
		'address_id',
		'is_active'
    ];

      public function pasal() 
    {
    	return $this->belongsTo('App\Models\Pasal');
    }
        public function address() 
    {
    	return $this->belongsTo('App\Models\Address');
    }
}
