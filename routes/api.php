<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\MapelController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\JadwalController;

// Laravel 12 API Resources
Route::apiResources([
    'users'  => UserController::class,
    'guru'   => GuruController::class,
    'mapel'  => MapelController::class,
    'kelas'  => KelasController::class,
    'siswa'  => SiswaController::class,
    'jadwal' => JadwalController::class,
]);