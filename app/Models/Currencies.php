<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    protected $table ='currencies';
    protected $fillable = [
    		  'id',
    		   'code',
    		  'tittle',
    		  'is_active'
    ];
}
