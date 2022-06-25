<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruKelasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'cekguru'])->group(function () {
    Route::get('test', function() {
        echo 'test';
    });
    Route::prefix('kelas')->group(function () {
        Route::get('create', [GuruKelasController::class, 'create']);
        Route::post('/', [GuruKelasController::class, 'store']);
        Route::prefix('{kode_kelas}')->group(function () {
            
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::prefix('kelas/{kode_kelas}')->group(function() {
        Route::get('/', [KelasController::class, 'index']);
        Route::prefix('tes/{id}')->group(function() {
            Route::get('/', [TesController::class, 'index']);
            Route::post('/', [TesController::class, 'store']);
            Route::get('skor', [SkorController::class, 'get_skor']);
        });
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
