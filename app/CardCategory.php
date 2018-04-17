<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardCategory extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'name',
	];
}
