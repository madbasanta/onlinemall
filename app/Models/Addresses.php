<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
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
