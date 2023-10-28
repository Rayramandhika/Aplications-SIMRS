<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\RumahsakitController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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

        Route::get('/', [UserController::class, 'index'])->name('pekat.index');

    Route::middleware(['IsRumahsakit'])->group(function () {
        Route::post('/store', [UserController::class, 'storePengaduan'])->name('pekat.store');
        Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
        Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');

        Route::get('/chat', [UserController::class, 'chat'])->name('pekat.chat');
    });

    Route::middleware(['guest'])->group(function () {
        //Login
        Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');

        //Register
        Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
        Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
    });


Route::prefix('admin')->group(function () {

    Route::middleware(['IsAdmin'])->group(function () {

        //Petugas
        Route::resource('petugas', PetugasController::class);

        //Laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');

        //SDM Rumah Sakit
        Route::resource('rumahsakit', RumahsakitController::class);

    });

    Route::middleware(['IsPetugas'])->group(function () {

        //Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        //Pengaduan
        Route::resource('pengaduan', PengaduanController::class);

        //Tanggapan
        Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'CreatOrUpdate'])->name('tanggapan.createOrUpdate');

        //logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    });

    Route::middleware(['isGuest'])->group(function () {
        Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });

});
