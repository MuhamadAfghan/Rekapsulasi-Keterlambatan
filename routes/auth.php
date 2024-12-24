<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataKeterlambatanController;
use App\Http\Controllers\LateController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Models\Late;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth',  'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
});




Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('student', StudentController::class);
    Route::resource('rombel', RombelController::class);

    Route::resource('user', UserController::class);
    Route::put('/user/{user}/change-password', [UserController::class, 'changePassword'])->name('user.update.password');

    Route::resource('rayon', RayonController::class);

    Route::resource('data-keterlambatan', DataKeterlambatanController::class);

    Route::resource('late', LateController::class);
});


Route::middleware(['auth', 'ps'])->group(function () {
    // Route::resource('student', StudentController::class)->only('index');
    Route::resource('late', LateController::class)->only('index', 'rekap');
    Route::get('/late/rekap', [LateController::class, 'rekap'])->name('late.rekap');
    Route::get('/late/print-pdf/{late}', [LateController::class, 'printPDF'])->name('late.print-pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');

    Route::get('/late', [LateController::class, 'index'])->name('late.index');
    Route::get('/late/{late}', [LateController::class, 'show'])->name('late.show');
    Route::get('/late/rekap', [LateController::class, 'rekap'])->name('late.rekap');
    Route::get('/late/print-pdf/{late}', [LateController::class, 'printPDF'])->name('late.print-pdf');
    Route::get('/late/print-excel', [LateController::class, 'printExcel'])->name('late.export-excel');

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
