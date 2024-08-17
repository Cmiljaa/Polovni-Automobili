<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index']);
Route::get('/login', [UserController::class, 'login'])
->name('user.login'); 

Route::resource('cars', CarController::class);

Route::resource('user', UserController::class);