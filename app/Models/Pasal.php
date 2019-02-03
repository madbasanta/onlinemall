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

    public function files() {
        return $this->hasMany('App\Models\File', 'table_id', 'id')->where('table_name', 'pasals');
    }

    public function inventories()
    {
    	return $this->hasMany('App\Models\Inventory', 'pasal_id', 'id');
    }

     public function categories()
    {
    	return $this->belongsToMany('App\Models\Category', 'pasal_categories', 'pasal_id', 'category_id');
    }

     public function address()
    {
    	return $this->belongsToMany('App\Models\Address', 'pasal_addresses', 'pasal_id', 'address_id');
    }

    public function getAddress()
    {
    	$address = $this->address->first();
    	if($address):
    		return sprintf(
	            '%s, %s, %s',
	            $address->add1, $address->add2, $address->city
	        );
    	endif;
    	return '';
    }
}