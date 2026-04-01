<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\MapelController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\JadwalController;

// ==========================================
// 1. RUTE PUBLIK (Akses Bebas Tanpa Token)
// ==========================================

// Rute khusus Login
Route::post('login', [UserController::class, 'login']);

// SAFE METHODS (Hanya GET: index & show)
// Menggunakan ->only() agar hanya bisa dibaca publik, tidak bisa diubah
Route::apiResource('users', UserController::class)->only(['index', 'show']);
Route::apiResource('guru', GuruController::class)->only(['index', 'show']);
Route::apiResource('mapel', MapelController::class)->only(['index', 'show']);
Route::apiResource('kelas', KelasController::class)->only(['index', 'show']);
Route::apiResource('siswa', SiswaController::class)->only(['index', 'show']);
Route::apiResource('jadwal', JadwalController::class)->only(['index', 'show']);


// ==========================================
// 2. RUTE TERPROTEKSI (Wajib Bawa Token JWT)
// ==========================================

Route::group(['middleware' => ['jwt.verify']], function() {

Route::get('me', [UserController::class, 'me']);
Route::post('logout', [UserController::class, 'logout']);
// UNSAFE METHODS (POST, PUT, DELETE)
Route::apiResource('users', UserController::class)->except(['index', 'show']);
Route::apiResource('guru', GuruController::class)->except(['index', 'show']);
Route::apiResource('mapel', MapelController::class)->except(['index', 'show']);
Route::apiResource('kelas', KelasController::class)->except(['index', 'show']);
Route::apiResource('siswa', SiswaController::class)->except(['index', 'show']);
Route::apiResource('jadwal', JadwalController::class)->except(['index', 'show']);

});