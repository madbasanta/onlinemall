<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AddressField;

class Address extends Model
{
    use AddressField;
    
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

}
