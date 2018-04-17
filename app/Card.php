<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	public $timestamps = false;
	protected $table = 'cards';

	protected $fillable = [
		'title', 'info', 'status'
	];
}
