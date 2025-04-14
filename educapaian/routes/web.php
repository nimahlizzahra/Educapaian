<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\CapaianController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CertificateController;


// 🔹 Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// 🔹 Autentikasi (Login & Logout)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// 🔹 Registrasi
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// 🔹 Group Route yang Butuh Login
Route::middleware(['auth'])->group(function () {
    // 🔹 Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 🔹 Resource Controllers (CRUD untuk Siswa, Guru, Prestasi, Capaian)
    Route::resource('siswas', SiswaController::class);
    Route::resource('gurus', GuruController::class);
    Route::resource('prestasis', PrestasiController::class);
    Route::resource('capaians', CapaianController::class);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// 🔹 Logout Manual (Alternatif)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect ke halaman welcome
})->name('logout');
