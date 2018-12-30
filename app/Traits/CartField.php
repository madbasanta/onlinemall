<?php
namespace App\Traits;

trait CartField {
	public $heads = [
        'user_id' => 'Buyer',
        'inventory_id' => 'Product',
        'quantity' => 'Qty',
        'current_price' => 'Hold Price',
        'currency_id' => 'Currency'
    ];

    public $fields = [
    	'user_id' => [
    		'type' => 'select',
    		'validation' => 'required',
    		'label' => 'User',
    		'options' => []
    	],
    	'inventory_id' => [
    		'type' => 'select',
    		'label' => 'Inventory',
    		'validation' => 'required',
    		'options' => []
    	],
    	'quantity' => [
    		'type' => 'number',
    		'validation' => 'required|numeric'
    	],
    	'current_price' => [
    		'type' => 'number',
    		'label' => 'Hold Price',
    		'validation' => 'required|numeric'
    	],
    	'currency_id' => [
    		'type' => 'select',
    		'label' => 'Currency',
    		'validation' => 'required',
    		'options' => []
    	]
    ];
}