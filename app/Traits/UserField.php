<?php
namespace App\Traits;

trait UserField {
	public $fields = [
		'name' => [
			'type' => 'text',
			'validation' => 'required',
			'label' => 'Name',
		], 
		'email' => [
			'type' => 'email',
			'validation' => 'required|email',
			'label' => 'Email'
		], 
		'password' => [
			'type' => 'password',
			'validation' => 'required|min:8|confirmed',
			'label' => 'Password'
		]
	];
	public $heads = [
		'name' => 'Name', 
		'email' => 'Email', 
		'verified_at' => 'Verified At', 
		'last_login' => 'Last login', 
		'is_active' => 'Status',
		'created_at' => 'Created At'
	];
}