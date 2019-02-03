<?php
namespace App\Traits;

trait ShippingAddressField {

    public $heads = [
		'addresses_add1' => 'Address1',
		'addresses_city'=> 'City',
		'currencies_code' => 'Currency',
    	'shipping_charge' => 'Shipping Charge',
		'is_active' => 'Status',
	];

    public $fields = [
		'order_id' => ['type' => 'select', 'label' => 'Order of', 'validation' => 'required', 'options' => [],
			'select2' => ['table' => 'orders', 'id' => 'id', 'text' => 'CONCAT(first_name,\' \',last_name)']
		],
		'address_id' => ['type' => 'select', 'label' => 'Address', 'validation' => 'required', 'options' => [],
			'select2' => ['table' => 'addresses', 'id' => 'id', 'text' => 'CONCAT(city,\', \',add1)']
		],
    	'shipping_charge' => ['type' => 'number', 'label' => 'Shipping Charge', 'validation' => 'nullable'],
		'currency_id' => ['type' => 'select', 'label' => 'Currency', 'validation' => 'nullable', 'options' => [],
			'select2' => ['table' => 'currencies', 'id' => 'id', 'text' => 'code']
		],
    	'is_active' => ['type' => 'checkbox', 'label' => 'Status', 'options' => [1 => 'Active']]
	];
	
	protected $relationships = [
		'addresses' => ['primary_key' => 'id', 'foreign_key' => 'address_id'],
		'orders' => ['primary_key' => 'id', 'foreign_key' => 'order_id'],
		'currencies' => ['primary_key' => 'id', 'foreign_key' => 'currency_id'],
	];
}