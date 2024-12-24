<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKeterlambatanController;
use App\Http\Controllers\LateController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('data-keterlambatan', DataKeterlambatanController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/late/rekap', [LateController::class, 'rekap'])->name('late.rekap');
});

Route::middleware('auth')->group(function () {
    Route::get('/late/print-excel', [LateController::class, 'printExcel'])->name('late.export-excel');
});

require __DIR__ . '/auth.php';
// require 'auth.php';