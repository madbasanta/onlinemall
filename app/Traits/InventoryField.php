<?php
namespace App\Traits;

trait InventoryField {	
    public $heads = [
        'products_name' => 'Product',
        'quantity' => 'Qty',
        'price' => 'Price',
        'old_price' => 'Old Price',
        'currencies_title' => 'Currency',
        'sizes_size' => 'Size',
        'colors_color' => 'Color',
        'brands_name' => 'Brand',
    ];
    public $fields = [
    	'brand_id' => [
            'type' => 'select',
    		'label' => 'Brand',
    		'validation' => 'required',
    		'options' => [],
            'select2' => ['table' => 'brands', 'id' => 'id', 'text' => 'name']
    	],
    	'product_id' => [
    		'type' => 'select',
    		'label' => 'Product',
    		'validation' => 'required',
    		'options' => [],
            'select2' => ['table' => 'products', 'id' => 'id', 'text' => 'name']
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
    		'validation' => 'required|numeric',
    	],
    	'currency_id' => [
    		'type' => 'select',
    		'label' => 'Currency',
    		'validation' => 'required',
    		'options' => [],
            'select2' => ['table' => 'currencies', 'id' => 'id', 'text' => 'title']
    	],
    	'size_id' => [
    		'type' => 'select',
    		'label' => 'Size',
    		'options' => [],
            'select2' => ['table' => 'sizes', 'id' => 'id', 'text' => 'size']
    	],
    	'color_id' => [
    		'type' => 'select',
    		'label' => 'Color',
    		'validation' => 'required',
    		'options' => [],
            'select2' => ['table' => 'colors', 'id' => 'id', 'text' => 'color']
    	]
    ];

    protected $relationships = [
        'products' => ['primary_key' => 'id', 'foreign_key' => 'product_id'],
        'currencies' => ['primary_key' => 'id', 'foreign_key' => 'currency_id'],
        'colors' => ['primary_key' => 'id', 'foreign_key' => 'color_id'],
        'brands' => ['primary_key' => 'id', 'foreign_key' => 'brand_id'],
        'sizes' => ['primary_key' => 'id', 'foreign_key' => 'size_id'],
    ];

}