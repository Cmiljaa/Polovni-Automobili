<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/cars');

Route::get('/cars/filter', [CarController::class, 'filter'])
->name('cars.filter');

Route::middleware('admin')->group(function(){
    Route::get('admin', [AdminController::class, 'index'])
    ->name('admin.dashboard');

    Route::put('allow/cars/{car}/{bool}', [AdminController::class, 'allow'])
    ->name('admin.allow');
});

Route::middleware('auth')->group(function(){
    Route::get('/user/list', [UserController::class, 'list'])
    ->name('user.list');
    
    Route::post('/logout', [UserController::class, 'logout'])
    ->name('user.logout');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [UserController::class, 'login'])
    ->name('login');
    
    Route::post('/login', [UserController::class, 'handleLogin'])
    ->name('handleLogin');
});

Route::resource('cars', CarController::class);

Route::resource('user', UserController::class);

Route::get('/cars/create', [CarController::class, 'create'])
->middleware('auth')
->name('cars.create');
