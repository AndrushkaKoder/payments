<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

	protected static ?string $password;

	public function definition(): array
	{
		return [
			'email' => fake()->unique()->safeEmail(),
			'password' => static::$password ??= Hash::make('password'),
		];
	}

}
