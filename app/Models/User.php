<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
	use HasFactory;

	protected $fillable = [
		'email',
		'password',
	];

	protected $hidden = [
		'password',
	];

	public function setPasswordAttribute(mixed $value): void
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Transaction::class, 'employee_id');
	}

	public function getUrl(): string
	{
		return route('users.show', ['id' => $this->id]);
	}
}
