<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index']);

Route::get('/login', [UserController::class, 'showLoginForm'])
->middleware('guest')
->name('user.showLoginForm');

Route::post('/login', [UserController::class, 'login'])
->middleware('guest')
->name('user.login');

Route::resource('cars', CarController::class);

Route::resource('user', UserController::class);