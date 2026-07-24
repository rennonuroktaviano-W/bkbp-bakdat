<?php

use Illuminate\Support\Facades\Route;

// 1. Landing Page Pertama
Route::get('/', function () {
    return view('welcome');
})->name('landing');

// 2. Dashboard / Landing Page Ke-2
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 3. Route Halaman Lainnya
Route::get('/daftar-siswa', fn() => view('dashboard.daftar-siswa'))->name('siswa.index');
Route::get('/absensi', fn() => view('dashboard.absensi'))->name('absensi.index');
Route::get('/konseling', fn() => view('dashboard.konseling'))->name('konseling.index');
Route::get('/laporan', fn() => view('dashboard.laporan'))->name('laporan.index');
Route::get('/pelanggaran', fn() => view('dashboard.pelanggaran'))->name('pelanggaran.index');
Route::get('/pengaturan', fn() => view('dashboard.pengaturan'))->name('pengaturan.index');