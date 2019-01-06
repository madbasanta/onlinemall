<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{CurrencyField, CommonTraits};

class Currency extends Model
{
    use CurrencyField, CommonTraits;
    
    protected $table ='currencies';
    protected $fillable = [
		'code',
		'tittle',
		'is_active'
    ];
}
