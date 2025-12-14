<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::middleware(['role:admin', 'prevent-back-history'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Dashboard Guru
Route::middleware(['role:guru', 'prevent-back-history'])->group(function () {
    Route::get('/guru/dashboard', [GuruDashboardController::class, 'index'])->name('guru.dashboard');

    // Default ketika guru klik "Absensi" di sidebar
    Route::get('/guru/absensi', function () {
        return redirect()->route('guru.kelas', ['mode' => 'absen']);
    })->name('guru.absensi.kelas');

    // Halaman pilih kelas (mode: absen / rekap)
    Route::get('/guru/kelas/{mode}', [AbsensiController::class, 'kelasList'])->name('guru.kelas');

    // Form Input Absensi
    Route::get('/guru/absensi/{id_kelas}', [AbsensiController::class, 'form'])->name('guru.absensi.form');
    Route::post('/guru/absensi/{id_kelas}', [AbsensiController::class, 'store'])->name('guru.absensi.submit');

    // Rekap: Pilih tanggal
    Route::get('/guru/rekap/{id_kelas}', [AbsensiController::class, 'rekapTanggal'])->name('guru.rekap.tanggal');

    // Rekap: Tampilkan hasil
    Route::post('/guru/rekap/{id_kelas}', [AbsensiController::class, 'rekapHarian'])->name('guru.rekap.hasil');

    // Rekap: Edit seluruh absensi hari itu
    Route::get('/guru/rekap/{id_kelas}/edit/{tanggal}', [AbsensiController::class, 'editHarian'])->name('guru.rekap.edit');
    Route::put('/guru/rekap/{id_kelas}/edit/{tanggal}', [AbsensiController::class, 'updateHarian'])->name('guru.rekap.update');
    Route::delete('/guru/rekap/{id_kelas}/delete/{tanggal}', [AbsensiController::class, 'deleteHarian'])->name('guru.rekap.delete');

    // Export (PDF/Excel)
    Route::get('/guru/rekap/{id_kelas}/export/pdf/{tanggal}', [AbsensiController::class, 'exportPdf'])->name('guru.rekap.export.pdf');
    Route::get('/guru/rekap/{id_kelas}/{tanggal}/excel', [AbsensiController::class, 'exportExcel'])->name('guru.rekap.excel');

    // Default ketika guru klik "Rekap Absensi" di sidebar
    Route::get('/guru/rekap', function () {
        return redirect()->route('guru.kelas', ['mode' => 'rekap']);
    })->name('guru.rekap.kelas');

    Route::get('/guru/siswa', [SiswaController::class, 'guruIndex'])->name('guru.siswa.index');
});

// Modul Kelas
Route::middleware(['role:admin', 'prevent-back-history'])->group(function () {
    Route::get('/admin/kelas', [KelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('/admin/kelas/tambah', [KelasController::class, 'create'])->name('admin.kelas.create');
    Route::post('/admin/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('/admin/kelas/{id_kelas}/edit', [KelasController::class, 'edit'])->name('admin.kelas.edit');
    Route::put('/admin/kelas/{id_kelas}', [KelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('/admin/kelas/{id_kelas}', [KelasController::class, 'delete'])->name('admin.kelas.delete');
    Route::get('/admin/kelas/{id_kelas}/siswa', [SiswaController::class, 'byClass'])->name('admin.kelas.siswa');
});

// Modul Siswa
Route::middleware(['role:admin', 'prevent-back-history'])->group(function () {
    Route::get('/admin/siswa', [SiswaController::class, 'indexAll'])->name('admin.siswa.index');
    Route::get('/admin/siswa/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
    Route::post('/admin/siswa', [SiswaController::class, 'store'])->name('admin.siswa.store');
    Route::get('/admin/siswa/{id_siswa}/edit', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::put('/admin/siswa/{id_siswa}', [SiswaController::class, 'update'])->name('admin.siswa.update');
    Route::delete('/admin/siswa/{id_siswa}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
});