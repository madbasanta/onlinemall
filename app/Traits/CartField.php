<?php
namespace App\Traits;

trait CartField {
	public $heads = [
        'users_name' => 'Buyer',
        'products_name' => 'Product',
        'quantity' => 'Qty',
        'current_price' => 'Hold Price',
        'currencies_title' => 'Currency'
    ];

    public $fields = [
    	'user_id' => [
    		'type' => 'select',
    		'validation' => 'required',
    		'label' => 'User',
    		'options' => [],
            'select2' => ['table' => 'users', 'id' => 'id', 'text' => 'name']
    	],
    	'inventory_id' => [
    		'type' => 'select',
    		'label' => 'Inventory',
    		'validation' => 'required',
    		'options' => [],
            'select2' => ['table' => 'inventories', 'id' => 'id', 'text' => 'products.name']
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
    		'options' => [],
            'select2' => ['table' => 'currencies', 'id' => 'id', 'text' => 'title']
    	]
    ];

    protected $relationships = [
        'users' => ['primary_key' => 'id', 'foreign_key' => 'user_id'],
        'inventories' => ['primary_key' => 'id', 'foreign_key' => 'inventory_id'],
        'currencies' => ['primary_key' => 'id', 'foreign_key' => 'currency_id'],
        'products' => ['primary_key' => 'id', 'foreign_key' => 'inventories.product_id'],
    ];
}