<?php
namespace App\Traits;

trait ShippingAddressField {

    public $heads = [
    	'product_id' => 'Product',
    	'address_id' => 'Address',
    	'shipping_charge' => 'Shipping Charge',
    	'currency_id' => 'Currency',
    	'is_active' => 'Status',
    ];

    public $fields = [
    	'product_id' => ['type' => 'select', 'label' => 'Product', 'validation' => 'required', 'options' => []],
    	'address_id' => ['type' => 'select', 'label' => 'Address', 'validation' => 'required', 'options' => []],
    	'shipping_charge' => ['type' => 'number', 'label' => 'Shipping Charge', 'validation' => 'required'],
    	'currency_id' => ['type' => 'select', 'label' => 'Currency', 'validation' => 'required', 'options' => []],
    	'is_active' => ['type' => 'checkbox', 'label' => 'Status', 'options' => ['Active']]
    ];
}