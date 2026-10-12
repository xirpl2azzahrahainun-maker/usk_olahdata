<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});


// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// Guest Route (Login & Register)
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);
});


// Authenticated Route
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
    // DATA PESERTA
    Route::get('/peserta', [PesertaController::class, 'index'])
        ->name('peserta.Datapeserta');

    Route::get('/peserta/tambah', [PesertaController::class, 'create'])
        ->name('peserta.create');

    Route::post('/peserta', [PesertaController::class, 'store'])
        ->name('peserta.store');

    Route::get('/peserta/{peserta}', [PesertaController::class, 'show'])
        ->name('peserta.show');

    Route::get('/peserta/{peserta}/edit', [PesertaController::class, 'edit'])
        ->name('peserta.edit');

    Route::put('/peserta/{peserta}', [PesertaController::class, 'update'])
        ->name('peserta.update');

    Route::delete('/peserta/{peserta}', [PesertaController::class, 'destroy'])
        ->name('peserta.destroy');

    // DATA SKEMA
   

    Route::resource('dataskema', SkemaController::class);
});