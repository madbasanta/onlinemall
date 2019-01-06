<?php
namespace App\Traits;

trait DiscountField {
	public $heads = [
    	'title' => 'Title',
    	'amount' => 'Amount',
    	'percent' => 'Percent',
    	'is_amount' => 'Amount',
    	'is_active' => 'Status'
    ];

    public $fields = [
    	'title' => [
    		'validation' => 'required'
    	],
    	'amount' => [
    		'type' => 'number',
    		'validation' => 'required|numeric'
    	],
    	'percent' => [
    		'type' => 'number',
    		'validation' => 'nullable|numeric'
    	],
        'is_active' => [
            'type' => 'checkbox',
            'label' => 'Status',
            'options' => [1 => 'Active']
        ]
    ];
}