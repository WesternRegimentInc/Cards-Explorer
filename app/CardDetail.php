<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardDetail extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'card_id', 'card_details', 'apply_link','intro_apr', 'regular_apr', 'annual_fee','credit_score','image','card_category'
	];
}
