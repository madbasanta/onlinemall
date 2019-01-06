<?php
namespace App\Traits;

trait CurrencyField {
	public $heads = [
    	'code' => 'Code',
    	'title' => 'Currency',
    	'is_active' => 'Status'
    ];
    public $fields = [
    	'code' => [
	    	'validation' => 'required'
    	],
    	'title' => [
	    	'validation' => 'required'
    	],
    	'is_active' => [
	    	'type' => 'checkbox',
	    	'label' => 'Status',
	    	'options' => [
	    		1 => 'Active'
	    	]
    	]
    ];
}