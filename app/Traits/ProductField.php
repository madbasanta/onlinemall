<?php
namespace App\Traits;

trait ProductField {

	public $heads = [
		'code' => 'Code',
		'name' => 'Name',
		'category_id' => 'Category'
	];

	public $fields = [
		'code' => ['validation' => 'required'],
		'name' => ['validation' => 'required'],
		'category_id' => ['type' => 'select', 'label' => 'Category', 'options' => []]
	];
}