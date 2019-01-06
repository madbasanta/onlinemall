<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CommonTraits;

class Demo extends Model
{
	use CommonTraits;
	
	protected $table = 'demo';

    protected $fillable = ['label'];

    public $heads = [
		'label' => 'Label',
	];
	public $fields = [
		'label' => ['validation' => 'required'],
	];
}
