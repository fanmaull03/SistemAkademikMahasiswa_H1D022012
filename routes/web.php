<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Livewire Components
use App\Livewire\Mahasiswa\MahasiswaIndex;
use App\Livewire\Prodi\ProdiIndex;
use App\Livewire\Matakuliah\MatakuliahIndex;
use App\Livewire\Krs\KrsIndex;
use App\Livewire\KrsReport;
use App\Livewire\Fakultas\FakultasIndex;
use App\Livewire\DaftarMahasiswaSks;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard hanya untuk user yang login dan terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mahasiswa-sks', DaftarMahasiswaSks::class)->name('mahasiswa.sks')->middleware('auth');

// Group route hanya untuk yang login
Route::middleware('auth')->group(function () {

    // 🧑 Profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 📚 Manajemen Mahasiswa
    Route::get('/mahasiswa', MahasiswaIndex::class)->name('mahasiswa.index');

    // 🏫 Manajemen Prodi
    Route::get('/prodi', ProdiIndex::class)->name('prodi.index');

    // 📘 Manajemen Matakuliah
    Route::get('/matakuliah', MatakuliahIndex::class)->name('matakuliah.index');

    // 📝 Form Pengisian KRS
    Route::get('/krs', KrsIndex::class)->name('krs.index');

    // 📊 Laporan KRS (Total SKS & Filter Mahasiswa)
    Route::get('/laporan-krs', KrsReport::class)->name('krs.laporan');

    Route::get('/fakultas', FakultasIndex::class)->name('fakultas.index');
});

require __DIR__.'/auth.php';
