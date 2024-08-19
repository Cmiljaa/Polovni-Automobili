<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/cars');

Route::resource('cars', CarController::class);

Route::resource('user', UserController::class);

Route::middleware('auth')->group(function(){
    Route::get('/cars/create', [CarController::class, 'create'])
    ->name('cars.create');
    
    Route::post('/logout', [UserController::class, 'logout'])
    ->name('user.logout');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [UserController::class, 'login'])
    ->name('login');
    
    Route::post('/login', [UserController::class, 'handleLogin'])
    ->name('handleLogin');
});