<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetensiController;
use App\Http\Controllers\JadwalPengunjungController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PengunjungController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('landing-page');

Route::get('/test', function () {
    return 'OK';
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/daftar-kunjungan', [KunjunganController::class, 'create'])->name('daftar-kunjungan.create');
Route::post('/daftar-kunjungan', [KunjunganController::class, 'store'])->name('daftar-kunjungan.store');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/visitors', [PengunjungController::class, 'index'])->name('visitors.index');
    Route::get('/visitors/create', [PengunjungController::class, 'create'])->name('visitors.create');
    Route::post('/visitors', [PengunjungController::class, 'store'])->name('visitors.store');
    Route::get('/visitors/{pengunjung}/edit', [PengunjungController::class, 'edit'])->name('visitors.edit');
    Route::put('/visitors/{pengunjung}', [PengunjungController::class, 'update'])->name('visitors.update');
    Route::delete('/visitors/{pengunjung}', [PengunjungController::class, 'destroy'])->name('visitors.destroy');
    Route::resource('/detensi', DetensiController::class);
    Route::get('/jadwal', [JadwalPengunjungController::class, 'index'])->name('schedule.index');
    Route::delete('/detensi/{id}', [DetensiController::class, 'destroy'])->name('detention.destroy');
    Route::get('visitors/export/excel', [PengunjungController::class, 'exportExcel'])
    ->name('visitors.export.excel');
    Route::get('visitors/export/pdf', [PengunjungController::class, 'exportPdf'])
    ->name('visitors.export.pdf');
    Route::get('/pengunjung/export-excel', [JadwalPengunjungController::class, 'exportExcel'])->name('pengunjung.excel');
    Route::get('/pengunjung/export-pdf', [JadwalPengunjungController::class, 'exportPdf'])->name('pengunjung.pdf');
});