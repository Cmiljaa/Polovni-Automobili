<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/cars');

Route::get('/legal/privacy_policy', function(){
    return view('partials.privacy_policy');
})->name('legal.privacy_policy');

Route::get('/legal/terms_conditions', function(){
    return view('partials.terms_conditions');
})->name('legal.terms_conditions');

Route::get('/cars/filter', [CarController::class, 'filter'])
->name('cars.filter');

Route::middleware('admin')->group(function(){
    Route::get('admin', [AdminController::class, 'index'])
    ->name('admin.dashboard');

    Route::put('allow/cars/{car}/{allowed}', [AdminController::class, 'allow'])
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

Route::resource('user', UserController::class)
->except(['index', 'show']);

Route::get('/cars/create', [CarController::class, 'create'])
->middleware('auth')
->name('cars.create');
