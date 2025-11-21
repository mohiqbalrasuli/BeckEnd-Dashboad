<?php

use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/mahasiswas', [MahasiswaController::class, 'index']);
Route::post('/mahasiswas', [MahasiswaController::class, 'store']);
Route::get('/mahasiswas/{id}', [MahasiswaController::class, 'show']);
Route::put('/mahasiswas/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswas/{id}', [MahasiswaController::class, 'destroy']);
Route::get('/mahasiswa/prodis', [MahasiswaController::class, 'getProdi']);

Route::get('/prodis', [ProdiController::class, 'index']);
Route::post('/prodis', [ProdiController::class, 'store']);
Route::get('/prodis/{id}', [ProdiController::class, 'show']);
Route::put('/prodis/{id}', [ProdiController::class, 'update']);
Route::delete('/prodis/{id}', [ProdiController::class, 'destroy']);