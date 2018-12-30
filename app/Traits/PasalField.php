<?php
namespace App\Traits;

trait PasalField {
	public $heads = [
		'name' => 'Name',
		'email' => 'Email',
		'contact' => 'Contact',
		'verified_at' => 'Verified At',
		'is_active' => 'Status',
	];

	public $fields = [
		'name' => ['validation' => 'required'],
		'email' => ['type' => 'email', 'validation' => 'required|email|unique:users,email'],
		'contact' => ['validation' => 'required|numeric'],
		'is_active' => ['type' => 'checkbox', 'label' => 'Status', 'options' => ['Active']]
	];
}