<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Traits\Userable;
use App\Models\User;

class UsersController extends Controller
{
	use Userable;

	public function create(): string
	{
		request()->validate([
			'email' => 'required|email|unique:users',
			'password' => 'required|min:5'
		]);

		$user = User::query()->create(request()->all());
		return "Пользователь {$user->email} создан";
	}

	public function insert(): ?string
	{
		request()->validate([
			'employee_id' => 'required|integer|',
			'hours' => 'required|integer|min:1|max:12|'
		]);

		$user = User::query()->find(request()->input('employee_id'));

		if (!$user) throw new UserNotFoundException('Пользователь не найден');

		/**
		 * @var User $user
		 */
		$hours = request()->input('hours');
		$user->transactions()->create([
			'hours' => $hours,
			'price' => $user->calculatePayment($hours)
		]);

		return "Для пользователя {$user->email} добавлено {$hours} часов.";
	}

	public function paymentsForUsers(): ?string
	{
		$users = User::query()
			->with(['transactions' => function ($query) {
				return $query->sPayed();
			}])
			->get();

		$responseCollect = collect();
		foreach ($users as $user) {
			$responseCollect->add([$user->id => $user->amount()]);
		}
		return $responseCollect->count() ? $responseCollect->toJson() : null;
	}



}
