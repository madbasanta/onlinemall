<?php
namespace App\Traits;

trait CategoryField {
	public $heads = [
    	'code' => 'Code',
    	'name' => 'Name',
    	'is_sub' => 'Sub',
    	'categories_name' => 'Parent',
    	'is_active' => 'Status',
    ];
    public $fields = [
    	'code' => [
    		'validation' => 'required'
    	],
    	'name' => [
    		'validation' => 'required'
    	],
    	'parent_id' => [
    		'label' => 'Sub Category Of',
    		'type' => 'select',
    		'options' => [],
            'select2' => ['table' => 'categories', 'id' => 'id', 'text' => 'name']
    	],
    	'is_active' => [
    		'label' => 'Status',
    		'type' => 'checkbox',
    		'options' => [
    			1 => 'Active'
    		]
    	],
    	'desc' => [
    		'validation' => 'required',
    		'type' => 'textarea',
    		'label' => 'Description',
    	]
    ];

    protected $relationships = [
        'categories' => ['primary_key' => 'id', 'foreign_key' => 'parent_id']
    ];
}