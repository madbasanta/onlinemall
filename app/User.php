<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
	protected $table='users';
	protected $fillable = [
			'id',
			'name',
			'email',
			'password',
			'last_login',
			'is_active',
			'verified_at'
	];
	protected $hidden = [
		'password', 'remember_token',
	];

	/*
	Basically checks whether the user has role of given id or not
	@param int $role_id
	@return bool
	*/
	public function hasRoleId($role_id)
	{
		return $this->role_id === $role_id;
	}
}