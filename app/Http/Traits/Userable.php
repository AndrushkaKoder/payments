<?php

namespace App\Http\Traits;

use App\Models\Transaction;

trait Userable
{
	#Погасить все транзакции
	public function payOff(): string
	{
		$totalSum = Transaction::query()->sPayed()->sum('price');
		Transaction::query()->update(['payed' => 1]);

		return $totalSum
			?
			"Все транзакции погашены. Сумма выплат за период составила {$totalSum}."
			:
			"Транзакций за период не обнаружено.";
	}

}
