<?php

use App\Http\Controllers\AbsensiAdminController;
use App\Http\Controllers\AbsensiGuruController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardGuruController;
use App\Http\Controllers\KelolaAbsensiAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajemenGuruAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// login sebagai admin

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/manajemen-guru', [ManajemenGuruAdminController::class, 'index'])->name('admin.manajemenGuru');
    Route::post('/admin/manajemen-guru', [ManajemenGuruAdminController::class, 'store'])->name('admin.manajemenGuru.store');
    Route::delete('/admin/manajemen-guru/{id}', [ManajemenGuruAdminController::class, 'destroy'])->name('admin.manajemenGuru.destroy');
    Route::put('/admin/manajemen-guru/update/{id}', [ManajemenGuruAdminController::class, 'update'])->name('admin.manajemenGuru.update');


    Route::get('/admin/kelola-absensi', [KelolaAbsensiAdminController::class, 'index'])->name('admin.kelolaAbsensi');
    Route::post('/admin/kelola-absensi', [KelolaAbsensiAdminController::class, 'store'])->name('admin.kelolaAbsensi.store');
    Route::delete('/admin/kelola-absensi/{id}', [KelolaAbsensiAdminController::class, 'destroy'])->name('admin.kelolaAbsensi.destroy');
    Route::put('/admin/kelola-absensi/update/{id}', [KelolaAbsensiAdminController::class, 'update'])->name('admin.kelolaAbsensi.update');




    Route::get('/admin/manajemen-absensi', [AbsensiAdminController::class, 'index'])->name('admin.absensi');
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

  

});

// login sebagai guru

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [DashboardGuruController::class, 'index'])->name('guru.dashboard');
    Route::post('/guru/absensi', [AbsensiGuruController::class, 'store'])->name('guru.absensi.store');
    Route::get('/guru/settings-akun', [UserController::class, 'index'])->name('guru.user.index');


    Route::get('/guru/logout', [LoginController::class, 'logout'])->name('guru.logout');


});

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect ke halaman login setelah logout
})->name('logout');

