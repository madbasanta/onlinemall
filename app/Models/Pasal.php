<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PasalField;

class Pasal extends Model
{
	use PasalField;

	protected $table = 'pasals';
	protected $filable = [
		'name', 
		'email', 
		'password', 
		'contact',
		'is_active', 
		'verified_at'
	];
	protected $hidden = ['password'];
}