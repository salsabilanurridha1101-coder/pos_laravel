<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\LoginController::class, 'index']);
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('belajar/tambah', [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('belajar.tambah');
Route::post('storeTambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('storeTambah');

Route::get('belajar/kurang', [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('belajar.kurang');
Route::post('storeKurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('storeKurang');

Route::get('belajar/bagi', [\App\Http\Controllers\BelajarController::class, 'bagi'])->name('belajar.bagi');
Route::post('storeBagi', [\App\Http\Controllers\BelajarController::class, 'storeBagi'])->name('storeBagi');

Route::get('belajar/kali', [\App\Http\Controllers\BelajarController::class, 'kali'])->name('belajar.kali');
Route::post('storeKali', [\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('storeKali');

Route::get('calculator', [\App\Http\Controllers\CalculatorController::class, 'create']);
Route::post('calculator/store', [\App\Http\Controllers\CalculatorController::class, 'store'])->name('calculator.store');


// Route::post('storeKali', [\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('storeKali');
// get: preview
// post: mengirim sebuah data melalui form
// update: mengirim sebuah data melalui form untuk update
// delete: mengirim sebuah data melalui form untuk hapus
