<?php
namespace App\Traits;

trait InventoryField {	
    public $heads = [
        'product_id' => 'Product',
        'quantity' => 'Qty',
        'price' => 'Price',
        'old_price' => 'Old Price',
        'currency_id' => 'Currency',
        'size_id' => 'Size',
        'color_id' => 'Color',
        'brand_id' => 'Brand',
    ];
    public $fields = [
    	'brand_id' => [
    		'type' => 'select',
    		'label' => 'Brand',
    		'validation' => 'required',
    		'options' => []
    	],
    	'product_id' => [
    		'type' => 'select',
    		'label' => 'Product',
    		'validation' => 'required',
    		'options' => []
    	],
    	'quantity' => [
    		'type' => 'number',
    		'validation' => 'required|numeric',
    	],
    	'price' => [
    		'type' => 'number',
    		'validation' => 'required|numeric',
    	],
    	'old_price' => [
    		'type' => 'number',
    		'label' => 'Old Price',
    		'validation' => 'nullable|numeric',
    	],
    	'currency_id' => [
    		'type' => 'select',
    		'label' => 'Currency',
    		'validation' => 'required',
    		'options' => []
    	],
    	'size_id' => [
    		'type' => 'select',
    		'label' => 'Size',
    		'validation' => 'required',
    		'options' => []
    	],
    	'color_id' => [
    		'type' => 'select',
    		'label' => 'Color',
    		'validation' => 'required',
    		'options' => []
    	]
    ];
}