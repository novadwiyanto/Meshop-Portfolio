<?php

use App\Livewire\ProductUpdate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    abort(404);
});

Route::view('/login', 'login')->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'must-admin'])->group(function () {
    Route::view('/dashboard', 'admin-dashboard');
    Route::view('/category', 'admin-category');
    Route::view('/product', 'admin-product');
    Route::view('/product-create', 'admin-productCreate');
    Route::view('/product-soldout', 'admin-product-soldout');
    Route::view('/product-archive', 'admin-product-archive');
    Route::view('/data_transaction', 'admin-transaction');
    Route::get('/product/{id}', ProductUpdate::class);
});

Route::middleware(['auth', 'must-user'])->group(function () {
    Route::view('/', 'user-home');
    Route::view('/home', 'user-home');
    Route::view('/transaction', 'user-transaction');
});
