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
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('transaksi', TransaksiController::class);
    Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
    Route::get('/customer/print/{id}', [CustomerController::class, 'print'])->name('customer.print');
    Route::resource('customer', CustomerController::class);
    Route::post('/import/keuangan', [KeuanganController::class, 'import'])->name('import.keuangan');
    Route::get('/import/template', [KeuanganController::class, 'downloadFile'])->name('import.template');
    Route::get('/keuangan/laporan', [KeuanganController::class, 'laporan'])->name('keuangan.laporan');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/umum/customer', [UmumController::class, 'index'])->name('umum');
    Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
    Route::get('/customer/print/{id}', [CustomerController::class, 'print'])->name('customer.print');
    Route::resource('customer', CustomerController::class);
});
