<?php
namespace App\Traits;

trait ProductField {

	public $heads = [
		'code' => 'Code',
		'name' => 'Name',
		'categories_name' => 'Category'
	];

	public $fields = [
		'name' => ['validation' => 'required'],
		'category_id' => ['type' => 'select', 'label' => 'Category', 'options' => [], 'select2' => [
			'table' => 'categories', 'id' => 'id', 'text' => 'name'
		]],
		'desc' => ['type' => 'textarea', 'validation' => 'required', 'label' => 'Description']
	];

	protected $relationships = [
		'categories' => ['primary_key' => 'id', 'foreign_key' => 'category_id']
	];
}