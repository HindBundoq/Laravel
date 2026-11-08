<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'home'])->name('home');
Route::get('/categories', [StoreController::class, 'categories'])->name('categories');
Route::get('/toys', [StoreController::class, 'toys'])->name('toys');
Route::get('/cart', [StoreController::class, 'cart'])->name('cart');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
