<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
protected $table='users'
protected $filable = [
			'id',
			'name',
			'email',
			'password	',
			'last_login',
			'is_active',
			'verified_at'
];
protected $hidden = [
'password', 'remember_token',
];
}