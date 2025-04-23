<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DataMasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SiswaControler;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::resource('data-master', DataMasterController::class);

    // Data Siswa / Guru
    Route::get('/profile', [SiswaControler::class, 'show'])->name('profile.show');

    // Data laporan
    Route::post('/data-laporan/{id}/kirim', [DataMasterController::class, 'kirimKeLaporan'])->name('data-laporan.kirim');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');
    Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');


});


