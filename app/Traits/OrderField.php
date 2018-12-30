<?php
namespace App\Traits;

trait OrderField {

	public $heads = [
		'inventory_id' => 'Inventory',
		'quantity' => 'Qty',
		'current_price' => 'Current Price',
		'currency_id' => 'Currency',
		'is_active' => 'Status',
	];

	public $fields = [
		'inventory_id' => [
			'type' => 'select',
			'label' => 'Inventory',
			'validation' => 'required',
			'options' => []
		],
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
			'options' => []
		],
		'is_active' => [
			'type' => 'checkbox',
			'label' => 'Status',
			'options' => ['Active']
		],
	];
}