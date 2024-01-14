<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
	public function index()
	{
		$users = User::all();
		return view('users.index', ['users' => $users]);
	}

	public function show(int $userId)
	{
		$user = User::query()
			->with('transactions', function ($query) {
				return $query->sPayed();
			})->findOrFail($userId);

		return view('users.show', ['user' => $user]);
	}

	public function add()
	{
		return view('users.add');
	}

	public function create()
	{
		request()->validate([
			'email' => 'required|unique:users|email',
			'password' => 'required|min:5|confirmed',
		]);

		$user = new User();
		$user->fill([
			'email' => htmlspecialchars(request()->input('email')),
			'password' => htmlspecialchars(Hash::make(request()->input('password')))
		]);
		$user->save();
		return redirect()->to('/users');
	}

	public function addHours()
	{
		request()->validate([
			'hours' => 'required|integer|min:1|max:12',
			'employee_id' => 'required|integer'
		]);

		$userId = request()->input('employee_id');
		$user = User::query()->findOrFail($userId);
		$user->transactions()->create([
			'hours' => request()->input('hours'),
			'price' => $this->getPrice(request()->input('hours'))
		]);

		return redirect()->to("/users/{$userId}");
	}

	public function calculation($id)
	{
		$user = User::query()->findOrFail($id);

		$salary = $user->transactions()
			->sPayed()
			->pluck('price')
			->sum();

		return view('users.calculation', [
			'user' => $user,
			'salary' => $salary,
		]);
	}

	public function total()
	{
		$totalPrice = Transaction::query()
			->sPayed()
			->sum('price');

		Transaction::query()->update([
			'payed' => 1
		]);

		return "Выплачено всем сотрудникам: {$totalPrice} рублей. Все транзакции за период завершены.";
	}


	private function getPrice(int $hours): int
	{
		return $hours * Transaction::HOUR_PRICE;
	}

}
