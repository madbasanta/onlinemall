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
    	// 'code' => [
    	// 	'validation' => 'required'
    	// ],
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

    private function checkCount($code) {
        return static::where('code', $code)->count() === 0;
    }

    private function getDynamicCode() {
        $code = null;
        $name = explode(' ', $this->name);
        if(sizeof($name) > 2) $code = $this->codeFromName($name);
        if($code && $this->checkCount($code)) return $code;
        if(sizeof($name) > 1) $code = $this->codeFromTwoName($name);
        if($code && $this->checkCount($code)) return $code;
        if(sizeof($name) > 0) $code = $this->codeFromSingleName($this->name);
        if($code && $this->checkCount($code)) return $code;
        throw new \Exception('Unable to set category code.');
    }

    private function codeFromName(array $name) {
        return array_reduce($name, function($acc, $curr) {
            return $acc . substr($curr, 0, 1);
        }, '');
    }

    private function codeFromTwoName(array $name) {
        return array_reduce($name, function($acc, $curr) {
            return $acc . substr($curr, 0, 2);
        }, '');
    }

    private function codeFromSingleName($name) {
        return substr($name, 0, 3);
    }
}