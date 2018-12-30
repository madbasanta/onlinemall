<?php
namespace App\Traits;

trait AddressField {
	public $heads = [
        'add1' => 'Address 1',
        'add2' => 'Address 2',
        'city' => 'City',
        'zip' => 'Zip',
        'state' => 'State',
        'country' => 'Country'
    ];
    
    public $fields = [
        'add1' => [
            'type' => 'text',
            'validation' => 'required',
            'label' => 'Address 1',
        ],
        'add2' => [
            'type' => 'text',
            'label' => 'Address 2',
        ],
        'city' => [
            'type' => 'text',
            'label' => 'City',
            'validation' => 'required'
        ],
        'zip' => [
            'type' => 'text',
            'validation' => 'required|numeric',
            'label' => 'Zip (Postal Code)'
        ],
        'state' => [
            'type' => 'text',
            'validation' => 'required',
            'label' => 'State'
        ],
        'country' => [
            'type' => 'text',
            'validation' => 'required',
            'label' => 'Country'
        ]
    ];
}