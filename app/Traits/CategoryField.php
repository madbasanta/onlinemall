<?php
namespace App\Traits;

trait CategoryField {
	public $heads = [
    	'code' => 'Code',
    	'name' => 'Name',
    	'is_sub' => 'Sub',
    	'parent_id' => 'Parent',
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
    		'validation' => 'required',
    		'label' => 'Sub Category Of',
    		'type' => 'select',
    		'options' => []
    	],
    	'is_active' => [
    		'label' => 'Status',
    		'type' => 'checkbox',
    		'options' => [
    			'Active'
    		]
    	],
    	'desc' => [
    		'validation' => 'required',
    		'type' => 'textarea',
    		'label' => 'Description',
    	]
    ];
}