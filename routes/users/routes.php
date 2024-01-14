<?php
use Illuminate\Support\Facades\Route;

Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/{id}', [\App\Http\Controllers\UsersController::class, 'show'])
	->where('id', "[0-9]+")->name('users.show');

Route::get('/users/total', [\App\Http\Controllers\UsersController::class, 'total'])->name('users.total');

Route::get('/users/add', [\App\Http\Controllers\UsersController::class, 'add'])->name('users.add');
Route::post('/users/create', [\App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/users/hours/add', [\App\Http\Controllers\UsersController::class, 'addHours'])->name('users.addHours');
Route::get('/users/{id}/calculation', [\App\Http\Controllers\UsersController::class, 'calculation'])->name('users.calculation');
