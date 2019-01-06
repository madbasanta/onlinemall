<?php
namespace App\Traits;

trait SizeField {
	public $heads = [
		'size' => 'Size',
		'is_active' => 'Status',
	];
	public $fields = [
		'size' => ['type' => 'number', 'validation' => 'required|numeric'],
		'is_active' => ['type' => 'checkbox', 'label' => 'Status', 'options' => [1 => 'Active']] 
	];
}