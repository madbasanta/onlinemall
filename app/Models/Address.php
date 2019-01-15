<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{AddressField, CommonTraits};

class Address extends Model
{
    use AddressField, CommonTraits;
    
    protected $table ='addresses';
    protected $fillable = [
        'id',
        'add1',
        'add2',
        'city',
        'zip',
        'state',
        'country',
        'is_active'
    ];

    public function PasalAddress() 
    {
        return $this->hasMany('App\Models\PasalAddress');
    }

}
