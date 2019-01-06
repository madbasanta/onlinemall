<?php
namespace App\Traits;

trait ColorField {
	public $heads = [
		'color' => 'Color',
		'is_active' => 'Status',
	];
	public $fields = [
		'color' => [
			'validation' => 'required'
		],
		'is_active' => [
			'type' => 'checkbox',
			'label' => 'Status',
			'options' => [
				1 => 'Active'
			]
		]
	];
}