<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TeacherController; // Pastikan untuk menggunakan huruf kapital yang tepat
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // route siswa
    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa');
        Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    });

    // route teacher
        Route::prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher');
        Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::put('/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
        Route::get('/{id}/detail', [TeacherController::class, 'detail'])->name('teacher.show');
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
    });

    // route mapel
    Route::prefix('mapel')->group(function () {
        Route::get('/', [MapelController::class, 'index'])->name('mapel');
        Route::get('/create', [MapelController::class, 'create'])->name('mapel.create');
        Route::post('/store', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/{id}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
    });
    // route nilai
    Route::prefix('nilai')->group(function () {
        Route::get('/', [NilaiController::class, 'index'])->name('nilai');
        Route::get('/create', [NilaiController::class, 'create'])->name('nilai.create');
        Route::post('/store', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
        Route::put('/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
    });
});

require __DIR__.'/auth.php';
