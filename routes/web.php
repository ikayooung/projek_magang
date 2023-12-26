<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\UmumController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'checkRole:keuangan'])->group(function () {
    // Transaksi
    Route::resource('transaksi', TransaksiController::class);

    // Customer
    Route::group(['prefix' => 'customer'], function () {
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::post('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
        Route::get('/print/{id}', [CustomerController::class, 'print'])->name('customer.print');
        Route::resource('/', CustomerController::class);
    });

    // Import Keuangan
    Route::post('/import/keuangan', [KeuanganController::class, 'import'])->name('import.keuangan');
    Route::get('/import/template', [KeuanganController::class, 'downloadFile'])->name('import.template');

    // Keuangan
    Route::get('/keuangan/laporan', [KeuanganController::class, 'laporan'])->name('keuangan.laporan');
});

Route::middleware(['auth', 'checkRole:umum'])->group(function () {
    // Umum
    Route::prefix('umum')->group(function () {
        // Route::resource('customer', CustomerController::class);
        Route::prefix('customer/amplop-kecil')->group(function () {
            Route::get('/', [UmumController::class, 'index'])->name('umum.amplop-kecil');
            Route::get('/create', [CustomerController::class, 'create'])->name('umum.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('umum.store');
            Route::post('/update/{id}', [CustomerController::class, 'update'])->name('umum.update');
            Route::post('/delete/{id}', [CustomerController::class, 'destroy'])->name('umum.delete');
            Route::get('/print/{id}', [CustomerController::class, 'print'])->name('umum.print');
        });

        Route::prefix('laporan')->group(function () {
            Route::get('amplop-kecil', [UmumController::class, 'laporanAmplopKecil'])->name('umum.laporanAmplopKecil');
            Route::get('amplop-besar', [UmumController::class, 'laporanAmplopBesar'])->name('umum.laporanAmplopBesar');
        });


        Route::prefix('customer/amplop-besar')->group(function () {
            Route::get('/', [UmumController::class, 'amplop_besar'])->name('umum.amplop-besar');
            Route::get('/create', [CustomerController::class, 'create'])->name('umum.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('umum.store');
            Route::post('/update/{id}', [CustomerController::class, 'update'])->name('umum.update');
            Route::post('/delete/{id}', [CustomerController::class, 'destroy'])->name('umum.delete');
            Route::get('/print/{id}', [CustomerController::class, 'print'])->name('umum.print');
            Route::post('/print/amplop-besar', [CustomerController::class, 'PrintAmplopBesar'])->name('umum.PrintAmplopBesar');
        });
    });

    // Customer
});
