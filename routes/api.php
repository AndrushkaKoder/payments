<?php

use Illuminate\Support\Facades\Route;

Route::post('/users/create', [\App\Http\Controllers\Api\UsersController::class, 'create']);
Route::post('/users/add_hours', [\App\Http\Controllers\Api\UsersController::class, 'insert']);
Route::get('/users/payments', [\App\Http\Controllers\Api\UsersController::class, 'paymentsForUsers']);
Route::get('/users/pay_off', [\App\Http\Controllers\Api\UsersController::class, 'payOff']);
