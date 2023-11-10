<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeuanganController;
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
    Route::resource('customer', CustomerController::class);
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::post('/import/keuangan', [KeuanganController::class, 'import'])->name('import.keuangan');
    Route::get('/import/template', [KeuanganController::class, 'downloadFile'])->name('import.template');
});
