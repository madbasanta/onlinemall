<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{PasalAddressField, CommonTraits};

class PasalAddress extends Model
{
    use PasalAddressField, CommonTraits;

    protected $table = 'pasal_addresses';
    protected $fillable = [
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
