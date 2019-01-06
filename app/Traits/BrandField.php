<?php
namespace App\Traits;

trait BrandField {
	public $heads = [
		'code' => 'Code',
		'name' => 'Brand Name',
		'is_active' => 'Status',
	];

	public $fields = [
		'code' => [
			'validation' => 'required',
		],
		'name' => [
			'validation' => 'required'
		],
		'is_active' => [
			'label' => 'Status',
			'type' => 'checkbox',
			'options' => [
				1 => 'Active'
			]
		],
		'desc' => [
			'type' => 'textarea',
			'label' => 'Description',
			'validation' => 'required'
		]
	];
}