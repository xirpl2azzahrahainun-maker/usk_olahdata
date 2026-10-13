<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Utama (Landing Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Guest Route (Login & Register)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});



// 3. Authenticated Route (Wajib login untuk masuk sistem)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Peserta & Skema otomatis dengan Resource Route
    Route::resource('peserta', PesertaController::class)->parameters(['peserta' => 'peserta']);
    Route::resource('dataskema', SkemaController::class);

    // 4. CRUD User (Manajemen Data User / Pendaftar sesuai gambar phpMyAdmin)
    Route::resource('user', UserController::class);
});
