<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeramalanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('login');
})->name('login');

Route::get('register', function () {
    return view('register');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('periode', PeriodeController::class)->except(['create', 'edit']);
    Route::resource('permintaan', PermintaanController::class)->except(['create', 'edit']);
    Route::resource('peramalan', PeramalanController::class)->only(['index', 'store']);
    Route::resource('laporan', LaporanController::class)->only(['index', 'store']);
    Route::resource('user', UserController::class)->except(['create', 'edit']);
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('hapus-peramalan', [PeramalanController::class, 'hapusPeramalan']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register'])->name('register');
