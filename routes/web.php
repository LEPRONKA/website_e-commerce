<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <-- agar baris 22 tidak error
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Route untuk menampilkan halaman utama
Route::get('/', function () { 
    return view('home'); 
});

// Route untuk menampilkan halaman form login & register
Route::get('/login', function () { 
    return view('auth.login'); 
})->name('login')->middleware('guest'); 

Route::get('/register', function () { 
    return view('auth.register'); 
})->middleware('guest');

// Route POST untuk memproses form
Route::post('/register', [AuthController::class, 'registerProcess']);
Route::post('/login', [AuthController::class, 'loginProcess']);

// Route Dashboard HANYA ADA SATU dan dilindungi middleware 'auth'
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// 1. Rute untuk MENAMPILKAN halaman form tambah produk (Harus di atas {id})
Route::get('/produk/create', [DashboardController::class, 'create'])->middleware(['auth']);

// 2. Rute untuk MEMPROSES data form dan menyimpannya ke database
Route::post('/produk/store', [DashboardController::class, 'store'])->middleware(['auth']);

// Rute untuk menampilkan form edit
Route::get('/produk/{id}/edit', [DashboardController::class, 'edit'])->middleware(['auth']);

// Rute untuk memproses update data
Route::put('/produk/{id}/update', [DashboardController::class, 'update'])->middleware(['auth']);

// Rute untuk menghapus data
Route::delete('/produk/{id}/destroy', [DashboardController::class, 'destroy'])->middleware(['auth']);

// Rute dinamis dengan parameter {id}
Route::get('/produk/{id}', [DashboardController::class, 'show'])->middleware(['auth']);

// Route untuk Logout (Hanya bisa diakses oleh user yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
