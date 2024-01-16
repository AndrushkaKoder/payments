<?php

use Illuminate\Support\Facades\Route;

Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/{id}', [\App\Http\Controllers\UsersController::class, 'show'])
	->where('id', "[0-9]+")->name('users.show');

Route::get('/users/pay_off', [\App\Http\Controllers\UsersController::class, 'payOff'])->name('users.payoff');

Route::get('/users/add', [\App\Http\Controllers\UsersController::class, 'add'])->name('users.add');
Route::post('/users/create', [\App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/users/hours/add', [\App\Http\Controllers\UsersController::class, 'addHours'])->name('users.addHours');
Route::get('/users/{id}/calculation', [\App\Http\Controllers\UsersController::class, 'calculation'])->name('users.calculation');
