<?php
namespace App\Traits;

trait PasalAddressField {
	public $heads = array(
		'pasals_name' => 'Shop',
		'addresses_city' => 'City'
	);

	public $fields = array(
		'pasal_id' => array(
			'type' => 'select',
			'label' => 'Pasal',
			'validation' => 'required',
			'select2' => array('table' => 'pasals', 'id' => 'id', 'text' => 'name'),
			'options' => array()
		),
		'address_id' => array(
			'type' => 'select',
			'label' => 'Address',
			'validation' => 'required',
			'select2' => array('table' => 'addresses', 'id' => 'id', 'text' => 'CONCAT(add1, " ", city)'),
			'options' => array()
		)
	);

	public $relationships = array(
		'pasals' => array('primary_key' => 'id', 'foreign_key' => 'pasal_id'),
		'addresses' => array('primary_key' => 'id', 'foreign_key' => 'address_id')
	);
}