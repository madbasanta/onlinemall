<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Pasals extends Model
{
protected $table='Pasals';
protected $filable = [
		'id',
		 'name', 
		 'email', 
		 'password', 
		 'contact',
		  'is_active', 
		  'verified_at'
];
}