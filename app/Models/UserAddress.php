<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table='user_address';
    protected $fillable=[
		'id',
		'user_id',
		'address_id',
		'is_active'
    ];
}
