<?php
namespace App\Traits;

trait OrderField {

	public $heads = [
		'products_name' => 'Inventory',
		'quantity' => 'Qty',
		'current_price' => 'Current Price',
		'currencies_title' => 'Currency',
		'is_active' => 'Status',
	];

	public $fields = [
		// 'inventory_id' => [
		// 	'type' => 'select',
		// 	'label' => 'Inventory',
		// 	'validation' => 'required',
		// 	'options' => [],
		// 	'select2' => ['table' => 'inventories', 'id' => 'id', 'text' => 'products.name']
		// ],
		'quantity' => [
			'type' => 'number',
			'validation' => 'required|numeric',
		],
		'current_price' => [
			'type' => 'number',
			'validation' => 'required|numeric',
			'label' => 'Current Price'
		],
		'currency_id' => [
			'type' => 'select',
			'validation' => 'required|numeric',
			'label' => 'Currency',
			'options' => [],
			'select2' => ['table' => 'currencies', 'id' => 'id', 'text' => 'title']
		],
		'is_active' => [
			'type' => 'checkbox',
			'label' => 'Status',
			'options' => [1 => 'Active']
		],
	];

	protected $relationships = [
		'currencies' => ['primary_key' => 'id', 'foreign_key' => 'currency_id'],
		// 'inventories' => ['primary_key' => 'id', 'foreign_key' => 'inventory_id'],
		'products' => ['primary_key' => 'id', 'foreign_key' => 'inventories.product_id']
	];
}