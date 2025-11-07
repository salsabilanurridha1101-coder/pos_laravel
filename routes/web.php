<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\LoginController::class, 'index']);
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::middleware(['auth'])->group(function(){
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    // Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    // Route::get('user', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    // Route::get('user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    // Route::post('user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    // Route::get('user/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    // Route::put('user/update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    // Route::delete('user/destroy/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::resource('role', \App\Http\Controllers\RoleController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('category', \App\Http\Controllers\CategoriesController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::resource('profile', \App\Http\Controllers\ProfileController::class);
    Route::resource('order', \App\Http\Controllers\OrderController::class);
    Route::post('change-password', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('change-profile', [\App\Http\Controllers\ProfileController::class, 'changeProfile'])->name('profile.change-profile');
    Route::get('get-products', [\App\Http\Controllers\OrderController::class, 'getProducts'])->name('get-products');



});

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
