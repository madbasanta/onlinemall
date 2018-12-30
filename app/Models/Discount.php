<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DiscountField;

class Discount extends Model
{
    use DiscountField;

    protected $table ='discounts';
    protected $fillable = [
        'tittle',
        'amount',
        'percent',
        'is_amount',
        'is_active',
    ];
}
