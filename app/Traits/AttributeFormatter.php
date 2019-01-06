<?php
namespace App\Traits;

use Carbon\Carbon;

trait AttributeFormatter {
	public $timestamps = true;

	public function getCreatedAtAttribute($date) {
		return date_create($date)->format('d-M-y h:i a');
	}

	public function getIsActiveAttribute($status) {
		return $status ? 'active' : '-';
	}

	public function getVerifiedAtAttribute($date) {
		if($date)
			return date_create($date)->format('d-M-y h:i a');
		return '-';
	}

	public function getLastLoginAttribute($date) {
		if($date)
			return date_create($date)->format('d-M-y h:i a');
		return '-';
	}
}