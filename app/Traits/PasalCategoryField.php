<?php
namespace App\Traits;

trait PasalCategoryField {
	public $heads = array(
		'pasals_name' => 'Pasal',
		'categories_name' => 'Category'
	);

	public $fields = array(
		'pasal_id' => array(
			'type' => 'select',
			'label' => 'Pasal',
			'validation' => 'required',
			'select2' => array('table' => 'pasals', 'id' => 'id', 'text' => 'name'),
			'options' => array()
		),
		'category_id' => array(
			'type' => 'select',
			'label' => 'Category',
			'validation' => 'required',
			'select2' => array('table' => 'categories', 'id' => 'id', 'text' => 'name'),
			'options' => array()
		)
	);

	public $relationships = array(
		'pasals' => array('primary_key' => 'id', 'foreign_key' => 'pasal_id'),
		'categories' => array('primary_key' => 'id', 'foreign_key' => 'category_id')
	);
}