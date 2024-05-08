<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('pages.welcome');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('pelanggan')->group(function () {
        Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
        Route::get('create', [PelangganController::class, 'create'])->name('pelanggan.create');
        Route::post('store', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::get('edit/{user}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::patch('update/{user}', [PelangganController::class, 'update'])->name('pelanggan.update');
        Route::delete('delete/{user}', [PelangganController::class, 'destroy'])->name('pelanggan.delete');
    });

    Route::prefix('pesanan')->group(function () {
        Route::get('/', [PesananController::class, 'index'])->name('pesanan.index');
        Route::get('create', [PesananController::class, 'create'])->name('pesanan.create');
        Route::post('store', [PesananController::class, 'store'])->name('pesanan.store');
        Route::get('edit/{pesanan}', [PesananController::class, 'edit'])->name('pesanan.edit');
        Route::patch('update/{pesanan}', [PesananController::class, 'update'])->name('pesanan.update');
        Route::delete('delete/{pesanan}', [PesananController::class, 'destroy'])->name('pesanan.delete');
    });

    Route::prefix('alternatif')->group(function () {
        Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('create', [AlternatifController::class, 'create'])->name('alternatif.create');
        Route::post('store', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('edit/{id}', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        Route::patch('update/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('delete/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.delete');
    });

    Route::prefix('kriteria')->group(function () {
        Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
        Route::get('create', [KriteriaController::class, 'create'])->name('kriteria.create');
        Route::post('store', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::get('edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
        Route::patch('update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::delete('delete/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.delete');
    });
});
