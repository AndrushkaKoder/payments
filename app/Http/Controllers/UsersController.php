<?php

namespace App\Http\Controllers;

use App\Http\Traits\Userable;
use App\Models\User;

class UsersController extends Controller
{
	use Userable;

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
		$user->fill(request()->all())->save();

		return redirect()->to('/users');
	}

	public function addHours()
	{
		request()->validate([
			'hours' => 'required|integer|min:1|max:12',
			'employee_id' => 'required|integer'
		]);

		/**
		 * @var User $user
		 */
		$userId = request()->input('employee_id');
		$user = User::query()->findOrFail($userId);
		$user->transactions()->create([
			'hours' => request()->input('hours'),
			'price' => $user->calculatePayment(request()->input('hours'))
		]);

		return redirect()->route('users.show', ['id' => $userId]);
	}

	public function calculation($id)
	{
		$user = User::query()->findOrFail($id);

		$salary = $user->transactions()->sPayed()->sum('price');

		return view('users.calculation', [
			'user' => $user,
			'salary' => $salary,
		]);
	}

}
