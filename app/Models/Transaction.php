<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
		'hours',
		'employee_id',
		'price',
		'payed'
	];

	const HOUR_PRICE = 100;

	public function scopeSPayed($query, $isPayed = 0)
	{
		return $query->where('payed', $isPayed);
	}
}
