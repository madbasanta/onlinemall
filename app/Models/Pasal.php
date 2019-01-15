<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\{PasalField, CommonTraits};

class Pasal extends Model
{
	use PasalField, CommonTraits;

	protected $table = 'pasals';
	protected $fillable = [
		'name', 
		'email', 
		'password', 
		'contact',
		'is_active', 
		'verified_at'
	];
	protected $hidden = ['password'];


    public function inventory()
    {
    	return $this->hasMany('App\Models\Inventory');
    }

     public function pasalAddress()
    {
    	return $this->hasMany('App\Models\PasalAddress');
    }
}