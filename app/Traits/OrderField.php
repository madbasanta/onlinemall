<?php
namespace App\Traits;

trait OrderField {

	public $heads = [
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'email' => 'Email',
		'created_at' => 'Date',
		'status' => 'Status'
	];

	public $fields = [
		'first_name' => [ 'validation' => 'required', 'lable' => 'First Name'],
		'last_name' => [ 'validation' => 'required', 'lable' => 'Last Name'],
		'type' => [
			'lable' => 'Order Type',
			'type' => 'select',
			'options' => [ 'domestic' => 'Domestic', 'international' => 'International' ]
		],
		'email' => [
			'type' => 'email',
			'label' => 'Email',
			'validation' => 'required|email'
		],
	];

	public function getStatusAttribute() {
		if(isset($this->attributes['shipped']) && $this->attributes['shipped']) {
			return '<span class="text-success">Shipped</span>';
		} else {
			return '<span class="text-danger">Pending</span>';
		}
	}

	public function getCreatedAtAtrribute() {
		return date_create($this->created_at)->format('d M, Y');
	}
}