<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    protected $table ='discounts';
    protected $fillable = [
    		  'id',
    		  'tittle',
    		  'amount',
    		  'percent',
    		  'is_amount',
    		  'is_active',
    ];
}
